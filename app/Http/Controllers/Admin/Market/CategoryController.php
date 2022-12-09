<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\Category\StoreProductCategoryRequest;
use App\Http\Requests\Admin\Market\Category\UpdateProductCategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Market\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = ProductCategory::orderBy('id', 'desc')->get();
        return view('admin.market.category.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = ProductCategory::where('parent_id', null)->get();
        return view('admin.market.category.create', compact('productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCategoryRequest $request, ImageService $imageService)
    {
        $productCategories = $request->all();

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');
            $result = $imageService->createIndexAndSave($request->file('image'));

            if ($result === false) {

                return redirect()->route('category.index')->with('swal-error', 'آپلود عکس انجام نشد');
            }

            $productCategories['image'] = $result;
        }

        ProductCategory::create($productCategories);
        return redirect()->route('category.index')->with('swal-success', 'دسته بندی جدید با موفقیت اضافه شد');
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
        $parentCategories = ProductCategory::where('parent_id', null)->get();

        $productCategory = ProductCategory::FindOrFail($id);
        return view('admin.market.category.edit', compact('productCategory', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductCategoryRequest $request, $id, ImageService $imageService)
    {
        $productCategory = ProductCategory::findOrFail($id);

        if ($request->hasFile('image')) {

            if (!empty($productCategory->image)) {
                $imageService->deleteDirectoryAndFiles($productCategory->image['directory']);
            }

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');
            $result = $imageService->createIndexAndSave($request->file('image'));

            $productCategory['image'] = $result;

            if ($result === false) {
                return redirect()->route('category.index')->with('swal-error', 'آپلود عکس انجام نشد');
            }
        } else {
            if (isset($productCategory['currentImage']) && !empty($productCategory->image)) {
                $image = $productCategory->image;
                $image['currentImage'] = $productCategory['currentImage'];
                $productCategory['image'] = $image;
            }
        }

        $productCategory->update([
            'name' => $request->name,
            'tags' => $request->tags,
            'image' => $productCategory['image'],
            'status' => $request->status,
            'show_in_menu' => $request->show_in_menu,
            'parent_id' => $request->parent_id,
            'description' => $request->description
        ]);

        return redirect()->route('category.index')->with('swal-success', 'دسته بندی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productCategory = ProductCategory::FindOrFail($id);
        $productCategory->destroy($id);
        return redirect()->route('category.index')->with('swal-success', 'دسته بندی با موفقیت حذف شد');
    }
}
