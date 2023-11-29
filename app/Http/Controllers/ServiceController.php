<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddServiceRequest;
use App\Models\Image;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    //

    public function show(){
        return view('admin.services.services',[
            'services' => Service::all()
        ]);
    }
    public function edit(Service $service){
        return view('admin.services.edit',[
            'service' => $service->load('image')
        ]);
    }
   public function viewAddService(){
        return view('admin.services.addServices');
   }
    public function delete(Service $service)
    {
        $service->delete();
        return Redirect::back()->with('message','Service deleted successfully');
    }
    public function store(AddServiceRequest $request ){

          $title = $request->title;
          $description = $request->description;
          $icon = $request->icon;

          $service = new Service();
          $service->title = $title;
          $service->description = $description;
          $service->save();

          $service_icon = $request->file('icon');

          $filename = uniqid().'.'.$service_icon->getClientOriginalExtension();
          Storage::disk('public')->put($filename,file_get_contents($service_icon));


          $new_image = new Image(['file_path'=>  $filename]);
          $service->image()->save($new_image);



        return Redirect::back()->with('message','Service added Successfully');


    }
}
