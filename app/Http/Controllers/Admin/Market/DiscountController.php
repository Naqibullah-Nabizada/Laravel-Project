<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\AmazingSale\StoreAmazingSaleRequest;
use App\Http\Requests\Admin\Market\AmazingSale\UpdateAmazingSaleRequest;
use App\Http\Requests\Admin\Market\CommonDiscount\StoreCommonDiscountRequest;
use App\Http\Requests\Admin\Market\CommonDiscount\UpdateCommonDiscountRequest;
use App\Http\Requests\Admin\Market\Copan\StoreCopanRequest;
use App\Http\Requests\Admin\Market\Copan\UpdateCopanRequest;
use App\Models\Market\AmazingSale;
use App\Models\Market\CommonDiscount;
use App\Models\Market\Copan;
use App\Models\Market\Product;
use App\Models\User;
use Monolog\Handler\AmqpHandler;

class DiscountController extends Controller
{
    public function copan()
    {
        $copans = Copan::orderBy('id', 'desc')->get();
        return view('admin.market.discount.copan.index', compact('copans'));
    }

    public function copanCreate()
    {
        $users = User::all();
        return view('admin.market.discount.copan.create', compact('users'));
    }

    public function copanStore(StoreCopanRequest $request)
    {
        $copans = $request->all();
        //! fixed date
        $realTimestampStart = substr($request->start_date, 0, 10);
        $copans['start_date'] = date('Y-m-d H:i:s', intval($realTimestampStart));

        $realTimestampStart = substr($request->end_date, 0, 10);
        $copans['end_date'] = date('Y-m-d H:i:s', intval($realTimestampStart));
        Copan::create($copans);
        return redirect()->route('admin.market.discount.copan')->with('swal-success', 'کوپن جدید با موفقیت ثبت شد');
    }

    public function copanEdit($id)
    {
        $copan = Copan::FindOrFail($id);
        $users = User::all();
        return view('admin.market.discount.copan.edit', compact('copan', 'users'));
    }

    public function copanUpdate(UpdateCopanRequest $request, $id)
    {
        $inputs = $request->all();
        $copan = Copan::FindOrFail($id);
        //! fixed date
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date('Y-m-d H:i:s', intval($realTimestampStart));

        $realTimestampStart = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date('Y-m-d H:i:s', intval($realTimestampStart));
        $copan->update($inputs);
        return redirect()->route('admin.market.discount.copan')->with('swal-success', 'کوپن با موفقیت ویرایش شد');
    }

    public function copanDestroy($id)
    {
        $copan = Copan::FindOrFail($id);
        $copan->delete($id);
        return redirect()->route('admin.market.discount.copan')->with('swal-success', 'کوپن با موفقیت حذف شد');
    }

    // !========================================================================================================================================

    // ! Start of common discount

    public function commonDiscount()
    {
        $commonDiscounts = CommonDiscount::all();
        return view('admin.market.discount.common.index', compact('commonDiscounts'));
    }

    public function commonDiscountCreate()
    {
        return view('admin.market.discount.common.create');
    }

    public function commonDiscountStore(StoreCommonDiscountRequest $request)
    {
        $commonDiscounts = $request->all();
        //! fixed date
        $realTimestampStart = substr($request->start_date, 0, 10);
        $commonDiscounts['start_date'] = date('Y-m-d H:i:s', intval($realTimestampStart));

        $realTimestampStart = substr($request->end_date, 0, 10);
        $commonDiscounts['end_date'] = date('Y-m-d H:i:s', intval($realTimestampStart));

        CommonDiscount::create($commonDiscounts);
        return redirect()->route('admin.market.discount.commonDiscount')->with('swal-success', 'تخفیف عمومی جدید با موفقیت ثبت شد');
    }

    public function commonDiscountEdit($id)
    {
        $commonDiscount = CommonDiscount::FindOrFail($id);
        return view('admin.market.discount.common.edit', compact('commonDiscount'));
    }

    public function commonDiscountUpdate(UpdateCommonDiscountRequest $request, $id)
    {
        $commonDiscount = CommonDiscount::FindOrFail($id);

        $inputs = $request->all();
        //! fixed date
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date('Y-m-d H:i:s', intval($realTimestampStart));

        $realTimestampStart = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date('Y-m-d H:i:s', intval($realTimestampStart));

        $commonDiscount->update($inputs);
        return redirect()->route('admin.market.discount.commonDiscount')->with('swal-success', 'تخفیف عمومی جدید با موفقیت ویرایش شد');
    }

    public function commonDiscountDistroy($id)
    {
        $commonDiscount = CommonDiscount::FindOrFail($id);
        $commonDiscount->delete($id);
        return redirect()->route('admin.market.discount.commonDiscount')->with('swal-success', 'تخفیف عمومی با موفقیت حذف شد');
    }


    // !========================================================================================================================================

    // ! Start of amazing sale

    public function amazingSale()
    {
        $amazingSales = AmazingSale::all();
        return view('admin.market.discount.amazing.index', compact('amazingSales'));
    }

    public function amazingSaleCreate()
    {
        $products = Product::all();
        return view('admin.market.discount.amazing.create', compact('products'));
    }


    public function amazingSaleStore(StoreAmazingSaleRequest $request)
    {

        $inputs = $request->all();
        //! fixed date
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date('Y-m-d H:i:s', intval($realTimestampStart));

        $realTimestampStart = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date('Y-m-d H:i:s', intval($realTimestampStart));
        AmazingSale::create($inputs);
        return redirect()->route('admin.market.discount.amazingSale')->with('swal-success', 'فروش شگفت انگیز جدید با موفقیت ثبت شد');
    }

    public function amazingSaleEdit($id)
    {
        $products = Product::all();
        $amazingSale = amazingSale::FindOrFail($id);
        return view('admin.market.discount.amazing.edit', compact('amazingSale', 'products'));
    }

    public function amazingSaleUpdate(UpdateAmazingSaleRequest $request, $id)
    {
        $amazingSale = amazingSale::FindOrFail($id);

        $inputs = $request->all();
        //! fixed date
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date('Y-m-d H:i:s', intval($realTimestampStart));

        $realTimestampStart = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date('Y-m-d H:i:s', intval($realTimestampStart));

        $amazingSale->update($inputs);
        return redirect()->route('admin.market.discount.amazingSale')->with('swal-success', 'فروش شگفت انگیز جدید با موفقیت ویرایش شد');
    }

    public function amazingSaleDestroy($id)
    {
        $amazingSale = amazingSale::FindOrFail($id);
        $amazingSale->delete($id);
        return redirect()->route('admin.market.discount.amazingSale')->with('swal-success', 'فروش شگفت انگیز با موفقیت حذف شد');
    }
}
