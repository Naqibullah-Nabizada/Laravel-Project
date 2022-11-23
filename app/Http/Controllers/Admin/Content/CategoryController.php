<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\Category\StorePostCategoryRequest;
use App\Http\Requests\Admin\Content\Category\UpdatePostCategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Content\PostCategory;

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
    public function store(StorePostCategoryRequest $request, ImageService $imageService)
    {
        $postCategories = $request->all();

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post-category');
            $result = $imageService->createIndexAndSave($request->file('image'));

            if ($result === false) {

                return redirect()->route('content.category.index')->with('swal-error', 'آپلود عکس انجام نشد');
            }

            $postCategories['image'] = $result;
        }

        PostCategory::create($postCategories);
        return redirect()->route('content.category.index')->with('swal-success', 'دسته بندی جدید با موفقیت اضافه شد');
        // ->with('toast-success', 'دسته بندی جدید با موفقیت اضافه شد')->with('alert-section-success', 'دسته بندی جدید با موفقیت اضافه شد');
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
    public function update(UpdatePostCategoryRequest $request, $id, ImageService $imageService)
    {
        $postCategory = PostCategory::findOrFail($id);

        if ($request->hasFile('image')) {

            if (!empty($postCategory->image)) {
                $imageService->deleteDirectoryAndFiles($postCategory->image['directory']);
            }

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post-category');
            $result = $imageService->createIndexAndSave($request->file('image'));

            $postCategories['image'] = $result;

            if ($result === false) {
                return redirect()->route('content.category.index')->with('swal-error', 'آپلود عکس انجام نشد');
            }
        } else {
            if (isset($postCategory['currentImage']) && !empty($postCategory->image)) {
                $image = $postCategory->image;
                $image['currentImage'] = $postCategory['currentImage'];
                $postCategory['image'] = $image;
            }
        }

        $postCategory->update([
            'name' => $request->name,
            'tags' => $request->tags,
            'image' => $postCategory['image'],
            'status' => $request->status,
            'description' => $request->description
        ]);

        return redirect()->route('content.category.index')->with('swal-success', 'دسته بندی با موفقیت ویرایش شد');
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
        return redirect()->route('content.category.index')->with('swal-success', 'دسته بندی با موفقیت حذف شد');
    }


    public function status($id)
    {

        $postCategory = PostCategory::findOrFail($id);

        $postCategory->status = $postCategory->status == 0 ? 1 : 0;

        $result = $postCategory->save();

        if ($result) {
            if ($postCategory->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
