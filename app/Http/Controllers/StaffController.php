<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStaffRequest;
use App\Models\Image;
use App\Models\Staff;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;


class StaffController extends Controller
{

    public function show(){
        return view('admin.staff.staff', [
            'staffs' => Staff::with('image')->get()
        ]);
    }
    public function  addStaff(){
//       dd("function loaded");
        return view('admin.staff.addStaff');
    }
    public function store(AddStaffRequest $request){
        $staff = new Staff();

        $staff->name = $request->input('name');
        $staff->position = $request->input('position');
        $staff->about = $request->input('about');
        $staff->twitter = $request->input('twitter');
        $staff->facebook = $request->input('facebook');
        $staff->instagram = $request->input('instagram');
        $staff->save();

        $service_icon = $request->file('staff_image');
        $filename = uniqid().'.'.$service_icon->getClientOriginalExtension();
        Storage::disk('public')->put($filename,file_get_contents($service_icon));


        $new_image = new Image(['file_path'=>  $filename]);
        $staff->image()->save($new_image);

        return Redirect::back()->with('message', 'Staff added successfully');
    }

    public function delete(Staff $staff){
        $staff->delete();
        return Redirect::back()->with('message','Staff deleted Successfully');
    }
    public function edit(Staff $staff){
        return view('admin.staff.editStaff',[
            'staff' => $staff->load('image')
        ]);
    }

    public function update(AddStaffRequest $request, Staff $staff){

        $staff->name = $request->input('name');
        $staff->position = $request->input('position');
        $staff->about = $request->input('about');
        $staff->twitter = $request->input('twitter');
        $staff->facebook = $request->input('facebook');
        $staff->instagram = $request->input('instagram');
        $staff->save();

        $service_icon = $request->file('staff_image');
        $filename = uniqid().'.'.$service_icon->getClientOriginalExtension();

        Storage::disk('public')->put($filename,file_get_contents($service_icon));

        $staff->image()->update(['file_path'=>$filename]);

        return Redirect::back()->with('message','Staff updated Successfully');
    }

}
