<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\ProductGallary\StoreProductGallaryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Market\Gallary;
use App\Models\Market\Product;

class GallaryController extends Controller
{
    public function index($id)
    {
        $product = Product::FindOrFail($id);
        $gallary = Gallary::where('product_id', $id)->orderBy('id', 'desc')->get();
        return view('admin.market.product.gallary.index', compact('product', 'gallary'));
    }



    public function create($id)
    {
        $product = Product::FindOrFail($id);
        return view('admin.market.product.gallary.create', compact('product'));
    }



    public function store(StoreProductGallaryRequest $request, $id, ImageService $imageService)
    {

        $product = Product::FindOrFail($id);

        $gallary = $request->all();

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-gallary');
            $result = $imageService->createIndexAndSave($request->file('image'));

            if ($result === false) {

                return redirect()->route('product.gallary.index', $product->id)->with('swal-error', 'آپلود عکس انجام نشد');
            }

            $gallary['image'] = $result;
            $gallary['product_id'] = $product->id;

        }

        Gallary::create($gallary);

        return redirect()->route('product.gallary.index', $product->id)->with('swal-success', 'تصویر محصول با موفقیت اضافه شد');
    }



    public function destroy($id, Product $product)
    {
        $gallary = Gallary::FindOrFail($id);
        $gallary->destroy($id);
        return redirect()->route('product.gallary.index', $product->id)->with('swal-success', 'تصویر محصول با موفقیت حذف شد');
    }
}
