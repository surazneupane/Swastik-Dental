<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPackageRequest;
use App\Models\Package;
use App\Models\packageService;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PackageController extends Controller
{
    //
    public function show(){
        return view('admin.package.package',[
         'packages' => Package::all()
        ] );
    }
    //View add package page
    public function createPackage(){
        return view('admin.package.addPackage');
    }

    public function store(AddPackageRequest $request){

        $data = $request->all();

        $package = new Package();
        $package->type = $request->package_type;
        $package->price = $request->price;
        $package->save();

        $package_id = $package->id;

        $serviceNames = [];

        foreach ($data as $key => $value) {

            // Check if the key starts with "serviceName_" and has a numeric part
            if (strpos($key, 'serviceName_') === 0 && is_numeric(substr($key, 12))) {

                $package_service = new packageService();

                // Extract the numeric part of the key and use it as an index
                $index = substr($key, 12);
                $serviceNames[$index] = $value;
                $package_service->package_id = $package_id;
                $package_service->name = $serviceNames[$index];
                $package_service->save();

            }
        }
        return Redirect::back()->with('message','Package added Successfully');
    }

    public function edit(Package $package){
//        dd('Route is hit');
        $id = $package->id;
        $services = packageService::where('package_id',$id)->get();
        return view('admin.package.edit',[

            'package' => $package,
            'services' => $services
        ]);
    }

    public function update(Request $request, Package $package ){

        $package->type = $request->input('package_type');
        $package->price = $request->input('price');
        $package->save();

        $data = $request->all();
        $id = $package->id;

        $package_service = packageService::where('package_id',$id)->get();

        $array_count=0;
        foreach ($data as $key => $value) {

            // Check if the key starts with "serviceName_" and has a numeric part
            if (strpos($key, 'serviceName_') === 0 && is_numeric(substr($key, 12))) {

                if ($package_service[$array_count]->name != $value) {
                    $id = $package_service[$array_count]->id;

                    $update_package_service = packageService::find($id);
                    $update_package_service->name = $value;
                    $update_package_service->save();

                }
                $array_count++;

            }
        }
        return Redirect::back()->with('message','Package deleted Successfully');
    }


        public function delete(Package $package){
            $package->delete();
            return Redirect::back()->with('message','Package deleted Successfully');
        }



}
