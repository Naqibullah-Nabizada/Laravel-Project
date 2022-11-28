<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notify\Email\UpdateEmailRequest;
use App\Http\Requests\Admin\Notify\EmailFile\StoreEmailFileRequest;
use App\Http\Requests\Admin\Notify\EmailFile\UpdateEmailFileRequest;
use App\Http\Services\File\FileService;
use App\Models\Notify\Email;
use App\Models\Notify\EmailFile;

class EmailFileController extends Controller
{

    public function index($id)
    {
        $email = Email::FindOrFail($id);
        return view('admin.notify.email-file.index', compact('email'));
    }


    public function create($id)
    {
        return view('admin.notify.email-file.create', compact('id'));
    }


    public function store(StoreEmailFileRequest $request, $id, FileService $fileService)
    {
        $files = $request->all();

        if ($request->hasFile('file')) {
            $fileService->setExclusiveDirectory('files' . DIRECTORY_SEPARATOR . 'email-files');
            $fileService->setFileSize($request->file('file'));
            $fileSize = $fileService->getFileSize();
            $result = $fileService->moveToPublic($request->file('file'));
            $fileFormat = $fileService->getFileFormat();
        }
        if ($request === false) {
            return redirect()->route('email-file.index', $id)->with('swal-error', 'آپلود فایل با خطا مواجه شد');
        }

        $files['public_mail_id'] = $id;
        $files['file_path'] = $result;
        $files['file_size'] = $fileSize;
        $files['file_type'] = $fileFormat;

        EmailFile::create($files);

        return redirect()->route('email-file.index', $id)->with('swal-success', 'آپلود فایل با موفقیت انجام شد');
    }


    public function show($id)
    {
        //
    }


    public function edit(EmailFile $file)
    {
        return view('admin.notify.email-file.edit', compact('file'));
    }


    public function update(UpdateEmailFileRequest $request, EmailFile $file, FileService $fileService)
    {
        $files = $request->all();

        if ($request->hasFile('file')) {

            if (!empty($file->file_path)) {
                $fileService->deleteFile($file->file_pathe, false);
            }

            $fileService->setExclusiveDirectory('files' . DIRECTORY_SEPARATOR . 'email-files');
            $fileService->setFileSize($request->file('file'));
            $fileSize = $fileService->getFileSize();
            $result = $fileService->moveToPublic($request->file('file'));
            $fileFormat = $fileService->getFileFormat();

            $files['file_path'] = $result;
            $files['file_size'] = $fileSize;
            $files['file_type'] = $fileFormat;
        }
        if ($request === false) {
            return redirect()->route('email-file.index', $file)->with('swal-error', 'آپلود فایل با خطا مواجه شد');
        }

        $file->update($files);

        return redirect()->route('email-file.index', $file->email->id)->with('swal-success', 'ویرایش فایل با موفقیت انجام شد');
    }


    public function destroy(EmailFile $file)
    {
        $file->delete();
        return redirect()->route('email-file.index', $file->email->id)->with('swal-success', 'حذف فایل با موفقیت انجام شد');
    }
}
