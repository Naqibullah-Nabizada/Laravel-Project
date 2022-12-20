<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Customer\LoginConfirmRequest;
use App\Http\Requests\Auth\Customer\LoginRegisterRequest;
use App\Http\Services\Message\Email\EmailService;
use App\Models\OTP;
use Illuminate\Support\Str;
use App\Models\User;
use App\Http\Services\Message\MessageService;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class LoginRegisterController extends Controller
{

    public function loginRegisterForm()
    {
        return view('customer.auth.login-register');
    }


    public function loginRegister(LoginRegisterRequest $request)
    {

        try {

            $inputs = $request->all();

            if (filter_var($inputs['id'], FILTER_VALIDATE_EMAIL)) {

                $type = 1; // 1 => email

                $user = User::where('email', $inputs['id'])->first();
                if (empty($user)) {
                    $newUser['email'] = $inputs['id'];
                }
            } else {
                $errorText = 'فرمت نا معتبر است';
                return redirect()->route('login-register-form')->with(['id' => $errorText]);
            }

            if (empty($user)) {
                $newUser['password'] = '98355854';
                $newUser['activation'] = 1;
                $user = User::create($newUser);
            }

            // create OTP code

            $OTP_Code = rand(111111, 999999);
            $token = Str::random(60);

            $OTP_Inputs = [
                'token' => $token,
                'user_id' => $user->id,
                'otp_code' => $OTP_Code,
                'login_id' => $inputs['id'],
                'type' => $type,
            ];

            OTP::create($OTP_Inputs);

            // send email

            if ($type === 1) {

                $emailService = new EmailService();
                $details = [
                    'title' => "ایمیل فعال سازی",
                    'body' => "کد فعال سازی شما : $OTP_Code",
                ];

                $emailService->setDetails($details);
                $emailService->setFrom('noreply@toplearn.com', 'toplearn');
                $emailService->setSubject('کد احراز هویت');
                $emailService->setTo($inputs['id']);

                $messageService = new MessageService($emailService);
            }

            $messageService->send();

            return redirect()->route('login-confirm-form', $token);
        } catch (Exception $e) {
            return redirect()->route('login-register-form')
            ->withErrors(['otp' => 'انترنت خود را بررسی کنید']);
        }
    }



    public function loginConfrimForm($token)
    {
        $OTP = OTP::where('token', $token)->first();

        if (empty($OTP)) {
            return redirect()->route('login-confirm-form')
            ->withErrors(['otp' => 'کد تائید را وارد کنید']);
        }
        return view('customer.auth.login-confirm', compact('token', 'OTP'));
    }


    public function loginConfirm(LoginConfirmRequest $request, $token)
    {
        $inputs = $request->all();

        $OTP = OTP::where('token', $token)->where('used', 0)
            ->where('created_at', '>=', Carbon::now()->subMinutes(5)->toDateTimeString())->first();


        if (empty($OTP)) {
            return redirect()->route('login-confirm-form', $token)
                ->withErrors(['otp' => 'کد تائید را وارد کنید']);
        }


        // if OTP not match
        if ($OTP->otp_code !== $inputs['otp']) {
            return redirect()->route('login-confirm-form', $token)
                ->withErrors(['otp' => 'کد وارد شده نادرست میباشد']);
        }

        // if everything ok

        $OTP->update(['used' => 1]);
        $user = $OTP->user()->first();

        if (empty($user->email_verified_at)) {
            $user->update(['email_verified_at' => Carbon::now()]);
        }

        Auth::login($user);
        return redirect()->route('customer.home');
    }


    public function loginResendOtp($token)
    {

        $OTP = OTP::where('token', $token)
            ->where('created_at', '<=', Carbon::now()
                ->subMinutes()->toDateTimeString())->first();

        if (empty($OTP)) {

            return redirect()->route('login-confirm-form', $token)
                ->withErrors(['otp' => 'کد تائید را وارد کنید']);
        }
        $user = $OTP->user()->first();
        // create OTP code

        $OTP_Code = rand(111111, 999999);
        $token = Str::random(60);

        $OTP_Inputs = [
            'token' => $token,
            'user_id' => $user->id,
            'otp_code' => $OTP_Code,
            'login_id' => $OTP->login_id,
            'type' => $OTP->type,
        ];

        OTP::create($OTP_Inputs);

        // send email
        if ($OTP->type === 1) {

            $emailService = new EmailService();
            $details = [
                'title' => "ایمیل فعال سازی",
                'body' => "کد فعال سازی شما : $OTP_Code",
            ];

            $emailService->setDetails($details);
            $emailService->setFrom('noreply@toplearn.com', 'toplearn');
            $emailService->setSubject('کد احراز هویت');
            $emailService->setTo($OTP->login_id);

            $messageService = new MessageService($emailService);
        }

        $messageService->send();

        return redirect()->route('login-confirm-form', $token);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('customer.home');
    }
}
