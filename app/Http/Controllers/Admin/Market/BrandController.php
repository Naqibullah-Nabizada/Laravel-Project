<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\Brand\StoreBrandRequest;
use App\Http\Requests\Admin\Market\Brand\UpdateBrandRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Market\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('admin.market.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.market.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request, ImageService $imageService)
    {
        $brands = $request->all();

        if ($request->hasFile('logo')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'brands');
            $result = $imageService->save($request->file('logo'));

            if ($result === false) {

                return redirect()->route('brand.index')->with('swal-error', 'آپلود عکس انجام نشد');
            }

            $brands['logo'] = $result;
        }

        Brand::create($brands);
        return redirect()->route('brand.index')->with('swal-success', 'برند جدید با موفقیت اضافه شد');
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
        $brand = Brand::FindOrFail($id);
        return view('admin.market.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, $id, ImageService $imageService)
    {
        $brand = Brand::findOrFail($id);

        if ($request->hasFile('logo')) {

            if (!empty($brand->logo)) {
                $imageService->deleteImage($brand->logo);
            }

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'brands');
            $result = $imageService->save($request->file('logo'));

            $brand['logo'] = $result;

            if ($result === false) {
                return redirect()->route('brand.index')->with('swal-error', 'آپلود عکس انجام نشد');
            }
        }

        $brand->update([
            'persion_name' => $request->persion_name,
            'original_name' => $request->original_name,
            'tags' => $request->tags,
            'status' => $request->status,
            'logo' => $brand['logo'],
        ]);

        return redirect()->route('brand.index')->with('swal-success', 'برند با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::FindOrFail($id);
        $brand->destroy($id);
        return redirect()->route('brand.index')->with('swal-success', 'برند با موفقیت حذف شد');
    }
}
