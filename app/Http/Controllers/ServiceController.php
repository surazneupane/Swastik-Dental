<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    //

    public function services(){
        return view('admin.services.services');
    }

    public function store(AddServiceRequest $request ){

          $title = $request->title;
          $description = $request->description;
          $icon = $request->icon;

          $service = new Service();
          $service->title = $title;
          $service->description = $description;

          $service_icon = $request->file('icon');
          $filename = uniqid().'.'.$service_icon->getClientOriginalExtension();
          Storage::disk('public')->put($filename,file_get_contents($service_icon));

          $service->icon = $filename;

          $service->save();

        return back()->with('message', 'Listing updated successfully');


    }
}
