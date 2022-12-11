<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CategoryAttribute\StoreCategoryAttributeRequest;
use App\Http\Requests\Admin\Market\CategoryAttribute\UpdateCategoryAttributeRequest;
use App\Models\Market\CategoryAttribute;
use App\Models\Market\ProductCategory;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_attributes = CategoryAttribute::orderBy('id', 'desc')->get();
        return view('admin.market.property.index', compact('category_attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_categories = ProductCategory::all();
        return view('admin.market.property.create', compact('product_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryAttributeRequest $request)
    {
        CategoryAttribute::create($request->all());
        return redirect()->route('property.index')->with('swal-success', 'فرم کالا با موفقیت اضافه شد');
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
        $product_categories = ProductCategory::all();
        $category_attribute = CategoryAttribute::FindOrFail($id);
        return view('admin.market.property.edit', compact('category_attribute', 'product_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryAttributeRequest $request, $id)
    {
        $category_attribute = CategoryAttribute::FindOrFail($id);
        $category_attribute->update($request->all());
        return redirect()->route('property.index')->with('swal-success', 'فرم کالا با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_attribute = CategoryAttribute::FindOrFail($id);
        $category_attribute->destroy($id);
        return redirect()->route('property.index')->with('swal-success', 'فرم کالا با موفقیت حذف شد');
    }
}
