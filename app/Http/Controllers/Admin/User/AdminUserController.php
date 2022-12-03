<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\Admin\StoreAdminRequest;
use App\Http\Requests\Admin\User\Admin\UpdateAdminRequest;
use App\Http\Services\Image\ImageService;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $admins = User::where('user_type', 1)->orderBy('id', 'desc')->get();
        return view('admin.user.admin-user.index', compact('admins'));
    }


    public function create()
    {
        return view('admin.user.admin-user.create');
    }


    public function store(StoreAdminRequest $request, ImageService $imageService)
    {

        $admins = $request->all();

        if ($request->hasFile('profile_photo_path')) {

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'users');
            $result = $imageService->save($request->file('profile_photo_path'));

            if ($result === false) {
                return redirect()->route('admin-user.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد');
            }

            $admins['profile_photo_path'] = $result;
        }

        $admins['user_type'] = 1;
        $admins['password'] = Hash::make($request->password);

        User::create($admins);
        return redirect()->route('admin-user.index')->with('swal-success', 'ادمین جدید با موفقیت اضافه شد');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $admin = User::FindOrFail($id);
        return view('admin.user.admin-user.edit', compact('admin'));
    }


    public function update(UpdateAdminRequest $request, $id, ImageService $imageService)
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
                return redirect()->route('admin-user.index')->with('swal-error', 'آپلود عکس انجام نشد');
            }
        }

        $admin->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'status' => $request->status,
        ]);
        return redirect()->route('admin-user.index')->with('swal-success', 'ادمین با موفقیت ویرایش شد');
    }


    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->forceDelete($id);

        return redirect()->route('admin-user.index')->with('swal-success', 'ادمین با موفقیت حذف شد');
    }
}
