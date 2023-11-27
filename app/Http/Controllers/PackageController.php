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

                $package = new Package();
                $package->type = $request->package_type;
                $package->price = $request->price;
                $package->save();

                $package_id = $package->id;

                 $package_service = new packageService();
                 $package_service->package_id = $package_id;
                 $package_service->name = $request->service_name_one;
                 $package_service->save();

                 if($request->service_name_two != null) {

                     $package_service = new packageService();
                     $package_service->package_id = $package_id;
                     $package_service->name = $request->service_name_two;
                     $package_service->save();
                 }

                if($request->service_name_three != null) {
                    $package_service = new packageService();
                    $package_service->package_id = $package_id;
                    $package_service->name = $request->service_name_three;
                    $package_service->save();
                }

                if($request->service_name_four !=null) {
                    $package_service = new packageService();
                    $package_service->package_id = $package_id;
                    $package_service->name = $request->service_name_four;
                    $package_service->save();
                }

                if($request->service_name_five !=null){
                    $package_service = new packageService();
                    $package_service->package_id = $package_id;
                    $package_service->name = $request->service_name_four;
                    $package_service->save();
                }
        return Redirect::back()->with('message','Package added Successfully');
    }


        public function delete(Package $package){
            $package->delete();
            return Redirect::back()->with('message','Package deleted Successfully');
        }

}
