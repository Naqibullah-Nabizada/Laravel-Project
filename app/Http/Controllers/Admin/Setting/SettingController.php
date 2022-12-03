<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\SettingRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Setting\Setting;
use Database\Seeders\SettingSedder;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $setting = Setting::first();
        if ($setting === null) {
            $default = new SettingSedder();
            $default->run();
            $setting = Setting::first();
        }
        return view('admin.setting.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $setting = Setting::FindOrFail($id);
        return view('admin.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, $id, ImageService $imageService)
    {
        $setting = Setting::findOrFail($id);

        if ($request->hasFile('icon')) {

            if (!empty($setting->image)) {
                $imageService->deleteImage($setting->image);
            }

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'setting');
            $imageService->setImageName('icon');
            $result = $imageService->save($request->file('icon'));

            $setting['icon'] = $result;

            if ($result === false) {
                return redirect()->route('setting.index')->with('swal-error', 'آپلود عکس انجام نشد');
            }
        }

        if ($request->hasFile('logo')) {

            if (!empty($setting->image)) {
                $imageService->deleteImage($setting->image);
            }

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'setting');
            $imageService->setImageName('logo');
            $result = $imageService->save($request->file('logo'));

            $setting['logo'] = $result;

            if ($result === false) {
                return redirect()->route('setting.index')->with('swal-error', 'آپلود عکس انجام نشد');
            }
        }

        $setting->update([
            'title' => $request->title,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'icon' => $setting['icon'],
            'logo' => $setting['logo'],
        ]);

        return redirect()->route('setting.index')->with('swal-success', 'دسته بندی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
