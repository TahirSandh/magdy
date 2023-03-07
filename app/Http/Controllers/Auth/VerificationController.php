<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\verifcation_code;
use App\Models\User;
use Auth;
use App\Mail\SendCodeResetPassword;
use Mail;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't recei`ve the original email message.
    |`
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
    public function index()
    {
        return view("auth.verify");
    }
    public function send_otp(request $request)
    {
      
        $verification_code = rand(10000,99999);
        Auth::user()->verifcation_code()->where("type",1)->delete();
        Auth::user()->verifcation_code()->create([
            "code" => $verification_code,
            "type" => 1
        ]);
        return redirect()->back()->with(["otp_send" => true,"phone" => $request->phone]);
    }
    public function verify_otp(request $request)
    {
     
        $this->validate($request, [
            'otp' => 'required',
        ]);
         $resp = Auth::user()->verifcation_code()->where([["code","=",$request->otp],["type","=",1],["status","=",1]])->first();
         if(!empty($resp))
        {
            $resp->update(["status" => 2]);
            Auth::user()->update(["phone_verified" => 1]);
            Auth::user()->update(["phone" => $request->phone]);
            return redirect()->back()->with(["otp_verify_success" => true , "message " => "OTP Successfully send..."]);
        }
        else
        {
            return redirect()->back()->with(["otp_send"=> true, "send_otp_success" => false, "message" => "OTP is incorrent..."]);
        }
    }


    public function send_mail(request $request)
    {
        $verification_code = rand(10000,99999);
        Auth::user()->verifcation_code()->where("type",2)->delete();
        Auth::user()->verifcation_code()->create([
            "code" => $verification_code,
            "type" => 2
        ]);
        $email = Auth::user()->email;
        // Mail::to($email)->send(new SendCodeResetPassword($verification_code));
        return redirect()->back()->with(["send_mail_success"=> true , "message" => "Email Successfully Send..."]);
    }
    
    
    public function verify_email(request $request)
    {
        // return Auth::user()->id;
        $code =Auth::user()->verifcation_code()->where("code",$request->otp)->where("status",1)->first();
        if($code)
        {
            User::where('id',Auth::user()->id)->update([
                'email_verified' => 1,
                'email_verified_at' => date('Y-m-d'),
            ]);
            return redirect()->back()->with(["success" => "Email Verified Successfully..."]);
        }
        else
        {
            return redirect()->back()->with(["error" => "Otp does not match..."]);   
        }
    }
}
