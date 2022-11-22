<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\Post\StorePostRequest;
use App\Http\Requests\Admin\Content\Post\UpdatePostRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Content\Post;
use App\Models\Content\PostCategory;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('admin.content.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postCategories = PostCategory::all();
        return view('admin.content.post.create', compact('postCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request, ImageService $imageService)
    {
        $posts = $request->all();

        //! fixed date

        $realTimestampStart = substr($request->published_at, 0, 10);
        $posts['published_at'] = date('Y-m-d H:i:s', intval($realTimestampStart));

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            $result = $imageService->createIndexAndSave($request->file('image'));

            if ($result === false) {
                return redirect()->route('post.index')->with('swal-error', 'آپلود عکس انجام نشد');
            }

            $posts['image'] = $result;
        }

        $posts['author_id'] = 1;

        Post::create($posts);
        return redirect()->route('post.index')->with('swal-success', 'پست جدید با موفقیت اضافه شد');
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
        $post = Post::FindOrFail($id);
        $postCategories = PostCategory::all();
        return view('admin.content.post.edit', compact('post', 'postCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id, ImageService $imageService)
    {

        $post = Post::FindOrFail($id);

        //! fixed date
        $realTimestampStart = substr($request->published_at, 0, 10);
        $post['published_at'] = date('Y-m-d H:i:s', intval($realTimestampStart));

        if ($request->hasFile('image')) {

            if (!empty($post->image)) {
                $imageService->deleteDirectoryAndFiles($post->image['directory']);
            }

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            $result = $imageService->createIndexAndSave($request->file('image'));

            $postCategories['image'] = $result;

            if ($result === false) {
                return redirect()->route('post.index')->with('swal-error', 'آپلود عکس انجام نشد');
            }
        } else {
            if (isset($post['currentImage']) && !empty($post->image)) {
                $image = $post->image;
                $image['currentImage'] = $post['currentImage'];
                $post['image'] = $image;
            }
        }

        $post->update([
            'title' => $request->title,
            'tags' => $request->tags,
            'category_id' => $request->category_id,
            'image' => $post['image'],
            'status' => $request->status,
            'published_at' => $post['published_at'],
            'commentable' => $request->commentable,
            'summary' => $request->summary,
            'body' => $request->body,
        ]);

        return redirect()->route('post.index')->with('swal-success', 'پست با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
