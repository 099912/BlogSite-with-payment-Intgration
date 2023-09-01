<?php

namespace App\Http\Controllers\admin;

use App\Events\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index(){
        $user=User::all();
        return view('admin.pages.home',compact('user'));

    }
    public function showProduct(){

        return view('admin.pages.paypal.product');


    }


    public function viewChat(){
        $data=User::all();
        return view('admin.pages.chat.view',compact('data'));
    }

    public function chat(Request $request){

        $username = Auth::user()->name;
        $message=$request->input('message');
        event(new Message(
            $username,
            $message
        ));
        return true;
    }
    // $username = Auth::user()->name;
    // $userId = $request->input('user_id');
    // $message = $request->input('message');

    // // Implement your logic to validate the user and message here if needed

    // // Broadcast the message to the private channel if the user is authorized
    // if (Auth::check() && (int) $userId === (int) Auth::user()->id) {
    //     event(new Message($message, $userId,$username,));
    //     return true;
    // }

}

