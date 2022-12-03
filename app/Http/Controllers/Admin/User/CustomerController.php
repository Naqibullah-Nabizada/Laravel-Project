<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\Customer\StoreCustomerRequest;
use App\Http\Requests\Admin\User\Customer\UpdateCustomerRequest;
use App\Http\Services\Image\ImageService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('user_type', 0)->orderBy('id', 'desc')->get();
        return view('admin.user.customer.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request, ImageService $imageService)
    {
        $admins = $request->all();

        if ($request->hasFile('profile_photo_path')) {

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'users');
            $result = $imageService->save($request->file('profile_photo_path'));

            if ($result === false) {
                return redirect()->route('customer.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد');
            }

            $admins['profile_photo_path'] = $result;
        }

        $admins['user_type'] = 0;
        $admins['password'] = Hash::make($request->password);

        User::create($admins);
        return redirect()->route('customer.index')->with('swal-success', 'مشتری جدید با موفقیت اضافه شد');
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
        $user = User::FindOrFail($id);
        return view('admin.user.customer.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, $id, ImageService $imageService)
    {
        $admin = User::findOrFail($id);

        if ($request->hasFile('profile_photo_path')) {

            if (!empty($admin->profile_photo_path)) {
                $imageService->deleteImage($admin->profile_photo_path);
            }

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'users');
            $result = $imageService->save($request->file('profile_photo_path'));

            $admin['profile_photo_path'] = $result;

            if ($result === false) {
                return redirect()->route('customer.index')->with('swal-error', 'آپلود عکس انجام نشد');
            }
        }

        $admin->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'status' => $request->status,
        ]);
        return redirect()->route('customer.index')->with('swal-success', 'مشتری با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::FindOrFail($id);
        $admin->forceDelete($id);
        return redirect()->route('customer.index')->with('swal-success', 'مشتری با موفقیت حذف شد');
    }
}
