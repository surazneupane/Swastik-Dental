<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function show()
    {

        return view('admin.sliders.dashboard',[
            'sliders' => Slider::with('image')->get()
        ]);
    }


}
