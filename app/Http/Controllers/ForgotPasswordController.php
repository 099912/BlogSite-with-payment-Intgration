<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    //
    public function showForgetPassword()
    {
       return view('admin.login.page.view_forgot');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // $token=Str::random(64);
        $otp = rand(100000,10000000);
        $otpExpiration = Carbon::now()->addMinutes(1);

///if wihtout usiing otp then remove otp from below

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $otp,
            'expires_at' => $otpExpiration,
            'created_at' => Carbon::now()
          ]);

        //and remove otp  from here if using without otp

        Mail::send('emails.forgetPassword', ['token' => $otp], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return redirect()->route('otp.get')->with('message', 'We have e-mailed your password reset link!');


    }
    // show otp page
    public function showOtp(){

        return view('admin.login.page.view_otp');

    }



    //verify otp
        public function verify_otp(Request $request)
    {

        $request->validate([
            'token' =>'required|max:7',
        ]);
        // $token=$request->token;
        $verifyOtp = DB::table('password_reset_tokens')
        ->where([
        // 'otp' => $request->otp,
        'token' => $request->token
        ])
        ->first();

        if(!$verifyOtp){
            return back()->withInput()->with('error', 'Invalid otp!');
        }

        // Check if OTP has expired
        if (now()->gt($verifyOtp->expires_at)) {
        // Clean up expired OTPs immediately after verification
            DB::table('password_reset_tokens')
            ->where('expires_at', '<', now())
            ->delete();


            return back()->withInput()->with('error', 'OTP has expired. Please request a new OTP.');
        }

        // Clean up expired OTPs immediately after verification




        session(['otp_verified' => true]);
        return redirect()->route('reset.password.get')->with('message', 'otp matched successfully');

    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPassword() {
         // Check if the user has already verified the OTP
        if (!session('otp_verified')) {
            return redirect()->route('otp.get')->with('error', 'Please verify the OTP first.');
        }

       return view('admin.login.page.view_resetpassword');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPassword(Request $request)
    {

        $request->validate([
            // 'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $records =  DB::table('password_reset_tokens')->first();

        if(!$records){
            return back()->withInput()->with('error', 'Invalid token!');
        }

//update password
        $user = User::where('email', $records->email)
                    ->update(['password' => Hash::make($request->password)]);

   ///delete record
                    DB::table('password_reset_tokens')->where(['email'=> $records->email])->delete();

        return redirect('/')->with('message', 'Your password has been changed!');
    }
























//     public function submitResetPassword(Request $request)
//     {

//         $request->validate([
//             'email' => 'required|email|exists:users',
//             'password' => 'required|string|min:6|confirmed',
//             'password_confirmation' => 'required'
//         ]);

//         $records =  DB::table('password_reset_tokens')->get();
//         foreach ($records as $record) {
//             if (Hash::check($request->token, $record->token) ) {
//                return $record->email;
//             }
//         }

//         $updatePassword = DB::table('password_reset_tokens')
//                             ->where([
//                             'email' => $request->email,
//                             'token' => $request->token
//                             ])
//                             ->first();

//         if(!$updatePassword){
//             return back()->withInput()->with('error', 'Invalid token!');
//         }

//         // $email=$updatePassword->email;
// //update password
//         $user = User::where('email', $request->email)
//                     ->update(['password' => Hash::make($request->password)]);

//         DB::table('password_resets')->where(['email'=> $request->email])->delete();

//         return redirect('/')->with('message', 'Your password has been changed!');
//     }














}
