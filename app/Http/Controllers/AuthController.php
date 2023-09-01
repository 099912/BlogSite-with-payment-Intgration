<?php

namespace App\Http\Controllers;
use App\Events\UserRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\UserVerify;


class AuthController extends Controller
{
    //
    function show(){
        if (Auth::check()) {
            return redirect('/admin/home'); // Redirect to dashboard if logged in
        }
        return view('admin.login.page.view_login');
    }


    public function checklogin(Request $request)
    {
          ///Validate the login credentials
    $credentials = $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);
    $remember = $request->has('remember');

    if (Auth::attempt($credentials,$remember)) {
        $user = Auth::user();

        if ($user->is_email_verified == 1) {
            if ($user->status === 'admin') {

                // $basic  = new \Vonage\Client\Credentials\Basic("3aed6928", "phwq5whatBNfeZFC");
                // $client = new \Vonage\Client($basic);
                // $response = $client->sms()->send(
                //     new \Vonage\SMS\Message\SMS("923336250890",'noOne', 'SUccessfully logged in')
                // );

                return redirect()->route('admin.view')->with('success', 'You have successfully logged in as an admin.');
            } else {
                return redirect()->route('admin.view')->with('success', 'You have successfully logged in.');
            }
        } else {
            Auth::logout(); // Log out the user if email is not verified
            return redirect()->route('login.view')->with('error', 'Please verify your email address.');
        }
    } else {
        return redirect()->route('login.view')->with('error', 'Invalid credentials.');
    }

    }

    public function logout(Request $request)
{
    Auth::logout();

    return redirect()->route('login.view')->with('success', 'You have successfully logged out.');
}


public function registration()
{
    return view('admin.login.page.view_register');
}
public function saveRegister(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);
//it will create a new user
    $data = $request->all();

    $query=User::create($data);

    //assaiging the the new created user to the variables
    $user_id=$query->id;
    $token = Str::random(64);

    UserVerify::create([
          'user_id' => $user_id,
          'token' => $token
        ]);

//mail function will mail to the user with the token and we pass the blade file

    Mail::send('emails.emailVerificationEmail', ['token' => $token], function($message) use($request){
          $message->to($request->email);
          $message->subject('Email Verification Mail');
      });

    // $basic  = new \Vonage\Client\Credentials\Basic("3aed6928", "phwq5whatBNfeZFC");
    // $client = new \Vonage\Client($basic);
    // $response = $client->sms()->send(
    //     new \Vonage\SMS\Message\SMS("923336250890",'noOne', 'SUccessfully logged in')
    // );
        $name=$query->name;
        event(new UserRegistration($name));
              return redirect()->route('login.view')->with('mail','Great! You have Successfully Registered');
}

public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;

            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

      return redirect()->route('login.view')->with('message', $message);
    }


}
