<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\Banner\StoreBannerRequest;
use App\Http\Requests\Admin\Content\Banner\UpdateBannerRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Content\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('id', 'desc')->get();
        $position = Banner::$positions;
        return view('admin.content.banner.index', compact('banners', 'position'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Banner::$positions;
        return view('admin.content.banner.create', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request, ImageService $imageService)
    {
        $banners = $request->all();

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'banner');
            $result = $imageService->save($request->file('image'));

            if ($result === false) {
                return redirect()->route('post.index')->with('swal-error', 'آپلود عکس انجام نشد');
            }

            $banners['image'] = $result;
        }

        Banner::create($banners);
        return redirect()->route('banner.index')->with('swal-success', 'بنر جدید با موفقیت اضافه شد');
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
        $positions = Banner::$positions;
        $banner = Banner::FindOrFail($id);
        return view('admin.content.banner.edit', compact('banner', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, $id, ImageService $imageService)
    {
        $banner = Banner::FindOrFail($id);

        if ($request->hasFile('image')) {

            if (!empty($banner->image)) {
                $imageService->deleteDirectoryAndFiles($banner->image);
            }

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'banner');
            $result = $imageService->save($request->file('image'));

            $banner['image'] = $result;

            if ($result === false) {
                return redirect()->route('banner.index')->with('swal-error', 'آپلود عکس انجام نشد');
            }
        } else {
            if (isset($banner->image) && !empty($banner->image)) {
                $image = $banner->image;
                $banner['image'] = $image;
            }
        }

        $banner->update([
            'title' => $request->title,
            'image' => $banner['image'],
            'status' => $request->status,
            'position' => $request->position,
            'url' => $request->url,
        ]);

        return redirect()->route('banner.index')->with('swal-success', 'بنر با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::FindOrFail($id);
        $banner->delete($id);
        return redirect()->route('banner.index')->with('swal-success', 'بنر با موفقیت حذف شد');
    }
}
