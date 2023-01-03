<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Crypt;

class SettingController extends Controller
{
    //

    public function index()
    {

        $editdata = \App\Models\Setting::first();

        return view('admin.setting.edit', compact('editdata'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'icon' => 'required',
            'logo' => 'required',
            'copyright' => 'required',
            'location' => 'required',
            'email' => 'required',
            'number' => 'required',
        ]);


        $obj =  \App\Models\Setting::where('id', Crypt::decrypt($id))->first();
        $obj->icon = $request->icon;
        $obj->logo = $request->logo;
        $obj->copyright = $request->copyright;
        $obj->location = $request->location;
        $obj->email = $request->email;
        $obj->number = $request->number;

        $obj->save();

        return response()->json(['status' => 1]);
    }

}
