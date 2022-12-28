<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Crypt;

class Aboutcontroller extends Controller
{
    //
    public function index(){

        return view('admin.about.index');
    }


    public function anydata(Request $request)
    {

        $sql = \App\Models\Aboutus::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })

            ->editColumn('image', function ($data) {
                return '<img src="' . \asset('uploads/aboutus') . '/' . $data->image . '">';
            })

            ->editColumn('title', function ($data) {
                return $data->title;
            })

            ->editColumn('short_description', function ($data) {
                return $data->short_description;
            })

            ->editColumn('long_description', function ($data) {
                return $data->long_description;
            })

            ->addColumn('status', function ($data) {
                return getStatusIcon($data);
            })



            ->addColumn('action', function ($data) {

                $string = '<a href="'.route('about.edit',Crypt::encrypt($data->id)).'" class="btn btn-primary btn-sm"> <i class="mdi mdi-table-edit"></i> </a> <a href="javascript:void(0)" data-link="' . route('about.delete',Crypt::encrypt($data->id)) . '" class="btn btn-danger btn-sm delete"> <i class="mdi mdi-delete-forever"></i></a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'image', 'title','short_description','long_description', 'status', 'action'])
            ->make(true);
    }

    public function SingleStatusChange(Request $request)
    {

        $l = \App\Models\Aboutus::where('id', \Crypt::decrypt($request->id))->first();
        if ($l != NULL) {

            if ($l->status == 1) {
                $l->status = \App\Models\Aboutus::STATUS_INACTIVE;
            } else {
                $l->status = \App\Models\Aboutus::STATUS_ACTIVE;
            }
            $l->save();
            return response()->json(['status' => $l->status]);
        }
    }

    public function create(){

        return view('admin.about.addedit');
    }

    public function store(Request $request){

        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'status' => 'required',
        ]);

        $obj = new \App\Models\Aboutus;
        $obj->title = $request->title;
        $obj->short_description = $request->short_description;
        $obj->long_description = $request->long_description;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            // @unlink('uploads/aboutus/' . $be->intro_bg2);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/aboutus/', $filename);

            $obj->image = $filename;


        }
        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function edit($id){

        $editdata = \App\Models\Aboutus::where('id',Crypt::decrypt($id))->firstOrfail();

        return view('admin.about.addedit',compact('editdata'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'status' => 'required',
        ]);

        $obj =  \App\Models\Aboutus::where('id',Crypt::decrypt($id))->first();
        $obj->title = $request->title;
        $obj->short_description = $request->short_description;
        $obj->long_description = $request->long_description;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            @unlink('uploads/aboutus/' . $obj->image);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/aboutus/', $filename);

            $obj->image = $filename;


        }
        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function delete($id){

        $obj = \App\Models\Aboutus::where('id',Crypt::decrypt($id))->first();

        @unlink('uploads/aboutus/' . $obj->image);

        $obj->delete();

        return response()->json(['status' => 0]);
    }

}
