<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\Category\StorePostCategoryRequest;
use App\Http\Requests\Admin\Content\Category\UpdatePostCategoryRequest;
use App\Models\Content\PostCategory;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postCategories = PostCategory::orderBy('id', 'desc')->get();
        return view('admin.content.category.index', compact('postCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostCategoryRequest $request)
    {
        $postCategories = $request->all();
        $postCategories['image'] = 'image';
        $postCategories['slug'] = str_replace(' ', '-', $postCategories['name'] . '-' . Str::random(5));

        PostCategory::create($postCategories);
        return redirect()->route('content.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postCategory = PostCategory::findOrFail($id);
        return view('admin.content.category.edit', compact('postCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostCategoryRequest $request, $id)
    {
        $postCategory = PostCategory::findOrFail($id);
        $postCategory['image'] = 'image';
        $postCategory->update([
            'name' => $request->name,
            'tags' => $request->tags,
            'image' => $postCategory['image'],
            'status' => $request->status,
            'description' => $request->description
        ]);

        return redirect()->route('content.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postCategory = PostCategory::findOrFail($id);
        $postCategory->destroy($id);
        return redirect()->route('content.category.index');
    }
}
