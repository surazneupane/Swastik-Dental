<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddSliderRequest;
use App\Models\Image;
use App\Models\Slider;
use App\Models\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{

    public function show(){
        return view ('admin.sliders.slider',
           [ 'sliders' => Slider::with('image')->get()]);
    }
    public function index()
    {
        $sliders = Slider::orderBy('created_at')->paginate(10);
        return view('admin.sliders.index', compact('sliders'));
    }

    public function createSlider(){
//       dd("function loaded");
       return view('admin.sliders.createSlider');
    }

    public function store(AddSliderRequest $request){

        $slider = new Slider();
        $slider->status = 0;
        $slider->save();

        $slider_image = $request->file('slider-image');
        $filename = uniqid() . '.' . $slider_image->getClientOriginalExtension();
        Storage::disk('public')->put($filename, file_get_contents($slider_image));

        $new_image = new Image(['file_path'=>  $filename]);
        $slider->image()->save($new_image);

        $text = new Text();
        $text->heading = $request->input('heading');
        $text->description = $request->input('description');

        $slider->text()->save($text);

        return redirect()->back();
    }

    public function edit(Slider $slider){
        return view('admin.sliders.edit',[
            'slider' => $slider->load('image')
        ]);
    }

    public function update(AddSliderRequest $request, Slider $slider)
    {
        $slider_image = $request->file('slider-image');
        $filename = uniqid() . '.' . $slider_image->getClientOriginalExtension();
        Storage::disk('public')->put($filename, file_get_contents($slider_image));

        $slider->image()->update(['file_path'=>$filename]);

        $slider->text()->update(['heading' => $request->input('heading') ]);
        $slider->text()->update(['description' => $request->input('description')]);
    }



}
