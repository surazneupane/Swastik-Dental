<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPackageRequest;
use App\Models\Package;
use App\Models\packageService;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    //
    public function show(){
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

    }
}
