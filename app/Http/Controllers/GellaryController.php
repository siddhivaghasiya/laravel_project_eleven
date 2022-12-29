<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Crypt;

class GellaryController extends Controller
{
    //
    public function index(){

        return view('admin.gellary.index');
    }


    public function anydata(Request $request)
    {

        $sql = \App\Models\Gellary::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })

            ->editColumn('image', function ($data) {
                return '<img src="' . \asset('uploads/gellary') . '/' . $data->image . '">';
            })


            ->editColumn('decription_one', function ($data) {
                return $data->decription_one;
            })

            ->editColumn('decription_two', function ($data) {
                return $data->decription_two;
            })
            ->editColumn('decription_three', function ($data) {
                return $data->decription_three;
            })

            ->editColumn('name', function ($data) {
                return $data->name;
            })

            ->editColumn('position', function ($data) {
                return $data->position;
            })

            ->editColumn('image_employee', function ($data) {
                return '<img src="' . \asset('uploads/gellary') . '/' . $data->image_employee . '">';
            })

            ->addColumn('status', function ($data) {
                return getStatusIcon($data);
            })

            ->addColumn('action', function ($data) {

                $string = '<a href="'.route('gellary.edit',Crypt::encrypt($data->id)).'" class="btn btn-primary btn-sm"> <i class="mdi mdi-table-edit"></i> </a> <a href="javascript:void(0)" data-link="' . route('gellary.delete',Crypt::encrypt($data->id)) . '" class="btn btn-danger btn-sm delete"> <i class="mdi mdi-delete-forever"></i></a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'image', 'description_one', 'description_two', 'description_three','name','position','image_employee', 'status','action'])
            ->make(true);
    }

    public function SingleStatusChange(Request $request)
    {

        $l = \App\Models\Gellary::where('id', \Crypt::decrypt($request->id))->first();
        if ($l != NULL) {

            if ($l->status == 1) {
                $l->status = \App\Models\Gellary::STATUS_INACTIVE;
            } else {
                $l->status = \App\Models\Gellary::STATUS_ACTIVE;
            }
            $l->save();
            return response()->json(['status' => $l->status]);
        }
    }

    public function create(){

        return view('admin.gellary.addedit');
    }


    public function store(Request $request){

        $request->validate([
            'image' => 'required',
            'description_one' => 'required',
            'description_two' => 'required',
            'description_three' => 'required',
            'name' => 'required',
            'position' => 'required',
            'image_employee' => 'required',
            'status' => 'required',
        ]);

        $obj = new \App\Models\Gellary;
        $obj->description_one = $request->description_one;
        $obj->description_two = $request->description_two;
        $obj->description_three = $request->description_three;
        $obj->name = $request->name;
        $obj->position = $request->position;
        $obj->status = $request->status;
        $obj->slug = makeslug($request->name,'-');

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            // @unlink('uploads/gellary/' . $be->intro_bg2);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/gellary/', $filename);

            $obj->image = $filename;


        }

        $img1 = $request->file('image_employee');

        if ($request->hasFile('image_employee')) {

            // @unlink('uploads/gellary/' . $be->intro_bg2);
            $filename1 = rand() .'.'. $img1->getClientOriginalExtension();
            $img1->move('uploads/gellary/', $filename1);

            $obj->image_employee = $filename1;


        }
        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function edit($id){

        $editdata = \App\Models\Gellary::where('id',Crypt::decrypt($id))->firstOrfail();

        return view('admin.gellary.addedit',compact('editdata'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'image' => 'required',
            'description_one' => 'required',
            'description_two' => 'required',
            'description_three' => 'required',
            'name' => 'required',
            'position' => 'required',
            'image_employee' => 'required',
            'status' => 'required',
        ]);

        $obj =  \App\Models\Gellary::where('id',Crypt::decrypt($id))->first();
        $obj->description_one = $request->description_one;
        $obj->description_two = $request->description_two;
        $obj->description_three = $request->description_three;
        $obj->name = $request->name;
        $obj->position = $request->position;
        $obj->status = $request->status;
        $obj->slug = makeslug($request->name,'-');

        $img = $request->file('image');

        if ($request->hasFile('image')) {

             @unlink('uploads/gellary/' . $obj->image);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/gellary/', $filename);

            $obj->image = $filename;


        }

        $img1 = $request->file('image_employee');

        if ($request->hasFile('image_employee')) {

             @unlink('uploads/gellary/' . $obj->image_employee);
            $filename = rand() .'.'. $img1->getClientOriginalExtension();
            $img1->move('uploads/gellary/', $filename);

            $obj->image_employee = $filename;


        }
        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function delete($id){

        $obj = \App\Models\Gellary::where('id',Crypt::decrypt($id))->first();

        @unlink('uploads/gellary/' . $obj->image);
        @unlink('uploads/gellary/' . $obj->image_employee);

        $obj->delete();

        return response()->json(['status' => 0]);
    }

}
