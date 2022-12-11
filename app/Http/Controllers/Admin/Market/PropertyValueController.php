<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CategoryValue\StoreCategoryValueRequest;
use App\Http\Requests\Admin\Market\CategoryValue\UpdateCategoryValueRequest;
use App\Models\Market\CategoryAttribute;
use App\Models\Market\CategoryValue;
use Illuminate\Http\Request;

class PropertyValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $categoryAttribute = CategoryAttribute::FindOrFail($id);
        return view('admin.market.property.value.index', compact('categoryAttribute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $categoryAttribute = CategoryAttribute::FindOrFail($id);
        return view('admin.market.property.value.create', compact('categoryAttribute'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryValueRequest $request, $id)
    {
        $categoryAttribute = CategoryAttribute::FindOrFail($id);
        $categoryValues = $request->all();
        $categoryValues['value'] = json_encode([
            'value' => $request->value,
            'price_increase' => $request->price_increase
        ]);
        $categoryValues['category_attribute_id'] = $categoryAttribute->id;
        CategoryValue::create($categoryValues);
        return redirect()->route('property.value.index', $categoryAttribute->id)->with('swal-success', 'مقدار فرم کالا با موفقیت ثبت شد');
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
    public function edit($id, CategoryValue $value)
    {
        $categoryAttribute = CategoryAttribute::FindOrFail($id);
        return view('admin.market.property.value.edit', compact('categoryAttribute', 'value'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryValueRequest $request, $id, CategoryValue $value)
    {
        $categoryAttribute = CategoryAttribute::FindOrFail($id);

        $categoryValues = $request->all();
        $categoryValues['value'] = json_encode([
            'value' => $request->value,
            'price_increase' => $request->price_increase
        ]);
        $categoryValues['category_attribute_id'] = $categoryAttribute->id;
        $value->update($categoryValues);
        return redirect()->route('property.value.index', $categoryAttribute->id)->with('swal-success', 'مقدار فرم کالا با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, CategoryValue $value)
    {
        $categoryAttribute = CategoryAttribute::FindOrFail($id);
        $value->delete($id);
        return redirect()->route('property.value.index', $categoryAttribute->id)->with('swal-success', 'مقدار فرم کالا با موفقیت حذف شد');
    }
}
