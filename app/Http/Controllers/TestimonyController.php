<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTestimonyRequest;
use App\Models\Image;
use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonyController extends Controller
{
    //
    public function show(){
        return view('admin.testimony.testimony',[
            'testimonies' => Testimony::all()
        ]);
    }
    public function addTestimony(){
//        dd('Route is Hit');
        return view('admin.testimony.addTestimony');
    }
    public function store(AddTestimonyRequest $request){
//        dd($request);

        $testimony = new Testimony();
        $testimony->quote = $request->quote;
        $testimony->name = $request->name;
        $testimony->position =$request->position;
        $testimony->company = $request->position;
        $testimony->save();

        $person_image = $request->file('person_image');
        $filename = uniqid().'.'.$person_image->getClientOriginalExtension();
        Storage::disk('public')->put($filename,file_get_contents($person_image));


        $new_image = new Image(['file_path'=>  $filename]);
        $testimony->image()->save($new_image);

    }
     public function delete(Testimony $testimony)
     {
         $testimony->delete();
     }
    public function edit(Testimony $testimony){
        return view('admin.testimony.editTestimony',[
            'testimony' => $testimony->load('image')
        ]);
    }
    public function update(AddTestimonyRequest $request, Testimony $testimony){

        $testimony->name = $request->input('name');
        $testimony->quote = $request->input('quote');
        $testimony->position = $request->input('position');
        $testimony->company = $request->input('company');

        $testimony->save();

        $person_image = $request->file('person_image');
        $filename = uniqid().'.'.$person_image->getClientOriginalExtension();

        Storage::disk('public')->put($filename,file_get_contents($person_image));

        $testimony->image()->update(['file_path'=>$filename]);
    }
}
