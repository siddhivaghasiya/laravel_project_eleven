<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Crypt;

class ContentController extends Controller
{
    //

    public function index(){

        $editdata = \App\Models\Content::first();

        return view('admin.content.addedit',compact('editdata'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'home_title' => 'required',
            'home_description' => 'required',
            'about_title' => 'required',
            'about_description' => 'required',
            'gellary_title' => 'required',
            'gellary_description' => 'required',
            'service_title' => 'required',
            'service_description' => 'required',
            'contact_title' => 'required',
            'contact_description' => 'required',
            'testimonial_title' => 'required',
            'testimonial_description' => 'required',
            'gellary_single_title' => 'required',
            'gellary_single_description' => 'required',
        ]);


        $obj =  \App\Models\Content::where('id',Crypt::decrypt($id))->first();
        $obj->home_title = $request->home_title;
        $obj->home_description = $request->home_description;
        $obj->about_title = $request->about_title;
        $obj->about_description = $request->about_description;
        $obj->service_title = $request->service_title;
        $obj->service_description = $request->service_description;
        $obj->gellary_title = $request->gellary_title;
        $obj->gellary_description = $request->gellary_description;
        $obj->contact_title = $request->contact_title;
        $obj->contact_description = $request->contact_description;
        $obj->testimonial_title = $request->testimonial_title;
        $obj->testimonial_description = $request->testimonial_description;
        $obj->gellary_single_title = $request->gellary_single_title;
        $obj->gellary_single_description = $request->gellary_single_description;

        $obj->save();

        return response()->json(['status' => 1]);
    }


}
