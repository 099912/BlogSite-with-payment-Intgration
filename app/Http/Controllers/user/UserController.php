<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceHead;
use App\Models\AboutHeader;
use App\Models\AboutPosition;
use App\Models\AboutTeam;
use App\Models\BlogHeader;
use App\Models\FeatureBlog;
use Illuminate\Http\Request;
use App\Models\HomeExplore;
use App\Models\HomeHeader;
use App\Models\HomeMemories;
use App\Models\HomeTravel;
use App\Models\HomeTestimonial;
use App\Models\ServiceFeatures;
use App\Models\ServiceHeader;
use App\Models\BlogDetail;
use App\Models\Contact;

class UserController extends Controller
{
    //
    public function home(){

        $explores=HomeExplore::all();
        $headers=HomeHeader::all();
        $memories=HomeMemories::all();
        $travels=HomeTravel::all();
        $testimonials=HomeTestimonial::all();
        $service=ServiceFeatures::all();
        $detail=BlogDetail::all();
//anotherway
        //$data=[
        // 'explores'=>HomeExplore::all(),
        // 'headers'=>HomeHeader::all(),
        // 'memories'=>HomeMemories::all(),
        // 'travels'=>HomeTravel::all(),
        // 'testimonials'=>HomeTestimonial::all(),
        // 'service'=>ServiceFeatures::all(),
        // 'detail'=>BlogDetail::all(),];
/// return view('user.pages.home')->with ('data'));,
        return view('user.pages.home',
        compact('explores','headers','memories',
        'travels','testimonials','service','detail'));
    }

    public function about(){
        $explores=HomeExplore::all();
        $team=AboutTeam::all();
        $position=AboutPosition::all();
        $service=ServiceFeatures::all();
        $header=AboutHeader::all();
            return view('user.pages.about',compact('team','position','header','explores','service'));
        }
        public function service(){
            $header=ServiceHeader::all();
            $service=ServiceFeatures::all();
            $blog=FeatureBlog::all();
            return view('user.pages.service',compact('header','service','blog'));
        }
        public function blog(){
            $header=BlogHeader::all();
            $detail=BlogDetail::all();
            return view('user.pages.blog',compact('header','detail'));
        }
        public function contact(){
                    return view('user.pages.contact');
                }

        public function store(Request $request){
$request->validate([
    'name'=>'required',
    'email'=>'required',
  'subject'=>'required',
  'message'=>'required'
]);
            $data=new Contact();
            $data->name=$request->name;
            $data->email=$request->email;
            $data->subject=$request->subject;
            $data->message=$request->message;
            $data->save();

            return redirect()->route('home.contact.view')->with('success', 'Thanks for conatacting us!');
        }
}
