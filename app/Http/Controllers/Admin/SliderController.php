<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    //
    public function index()
    {
        $sliders = Slider::orderBy('created_at')->paginate(10);
        return view('admin.sliders.index', compact('sliders'));
    }
}
