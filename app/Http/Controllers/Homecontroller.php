<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crypt;
class Homecontroller extends Controller
{
    //
    public function index(){

        $getgellary = \App\Models\Gellary::where('status', 1)->get();
        $getcontent = \App\Models\Content::first();


        return view('front.home',compact('getgellary','getcontent'));
    }

    public function contact(){

        $getcontent = \App\Models\Content::first();
        $getsetting = \App\Models\Setting::first();

        return view('front.contact',compact('getcontent','getsetting'));
    }

    public function contactstore(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $obj = new \App\Models\Contact;
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->subject = $request->subject;
        $obj->message = $request->message;

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function gellary(){

    $getgellary = \App\Models\Gellary::where('status', 1)->get();
    $getcontent = \App\Models\Content::first();

        return view('front.gellary',compact('getgellary','getcontent'));
    }

    public function gellarysingle($id){

        $getgellary = \App\Models\Gellary::where('slug',$id)->first();
        $getcontent = \App\Models\Content::first();

            return view('front.gellary-single',compact('getgellary','getcontent'));
        }

    public function about(){

        $getdata = \App\Models\Aboutus::where('status',1)->first();
        $gettestimonialdata = \App\Models\Testimonial::where('status',1)->get();
        $getcontent = \App\Models\Content::first();

        return view('front.about',compact('getdata','gettestimonialdata','getcontent'));
    }
    public function service(){

        $gettestimonialdata = \App\Models\Testimonial::where('status',1)->get();
        $getservice = \App\Models\Service::where('status',1)->get();
        $getcontent = \App\Models\Content::first();

        return view('front.service',compact('gettestimonialdata','getservice','getcontent'));
    }
}
