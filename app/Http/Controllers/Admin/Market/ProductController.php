<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\Product\StoreProductRequest;
use App\Http\Requests\Admin\Market\Product\UpdateProductRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Market\Brand;
use App\Models\Market\Product;
use App\Models\Market\ProductCategory;
use App\Models\Market\ProductMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.market.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $productCategories = ProductCategory::all();
        return view('admin.market.product.create', compact('brands', 'productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request, ImageService $imageService)
    {
        $products = $request->all();

        //! fixed date

        $realTimestampStart = substr($request->published_at, 0, 10);
        $products['published_at'] = date('Y-m-d H:i:s', intval($realTimestampStart));

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');
            $result = $imageService->createIndexAndSave($request->file('image'));

            if ($result === false) {

                return redirect()->route('product.index')->with('swal-error', 'آپلود عکس انجام نشد');
            }

            $products['image'] = $result;
        }

        DB::transaction(function () use ($products, $request) {

            $product = Product::create($products);

            $metas = array_combine($request->meta_key, $request->meta_value);

            foreach ($metas as $key => $value) {
                ProductMeta::create([
                    'meta_key' => $key,
                    'meta_value' => $value,
                    'product_id' => $product->id,
                ]);
            }
        });

        return redirect()->route('product.index')->with('swal-success', ',محصول جدید با موفقیت اضافه شد');
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
        $product = Product::FindOrFail($id);
        $brands = Brand::all();
        $productCategories = ProductCategory::all();
        return view('admin.market.product.edit', compact('brands', 'productCategories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id, ImageService $imageService)
    {
        $product = Product::FindOrFail($id);

        $inputs = $request->all();

        //! fixed date
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', intval($realTimestampStart));

        if ($request->hasFile('image')) {

            if (!empty($product->image)) {
                $imageService->deleteDirectoryAndFiles($product->image['directory']);
            }

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');
            $result = $imageService->createIndexAndSave($request->file('image'));

            $inputs['image'] = $result;

            if ($result === false) {
                return redirect()->route('product.index')->with('swal-error', 'آپلود عکس انجام نشد');
            }
        } else {
            if (isset($product['currentImage']) && !empty($product->image)) {
                $image = $product->image;
                $image['currentImage'] = $product['currentImage'];
                $inputs['image'] = $image;
            }
        }

        $product->update($inputs);

        //! Update Product Meta

        $meta_keys = $request->meta_key;
        $meta_values = $request->meta_value;
        $meta_ids = array_keys($request->meta_key);

        $metas = array_map(function ($meta_id, $meta_key, $meta_value) {
            return array_combine(
                ['meta_id', 'meta_key', 'meta_value'],
                [$meta_id, $meta_key, $meta_value]
            );
        }, $meta_ids, $meta_keys, $meta_values);

        foreach ($metas as $meta) {
            ProductMeta::where('id', $meta['meta_id'])->update([
                'meta_key' => $meta['meta_key'],
                'meta_value' => $meta['meta_value']
            ]);
        }

        return redirect()->route('product.index')->with('swal-success', 'محصول با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::FindOrFail($id);
        $product->destroy($id);
        return redirect()->route('product.index')->with('swal-success', 'محصول با موفقیت حذف شد');
    }
}
