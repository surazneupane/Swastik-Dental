<?php

namespace App\Http\Controllers;


use App\Http\Requests\SaveAppointement;
use App\Models\Appointable;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\Slider;
use Carbon\Carbon;

class PublicController extends Controller
{
    //

    public function show()
    {
//        $sliders = Slider::all();
        return view('public.index',[
            'sliders' => Slider::with('image')->get()
        ] ) ;
    }


    public function about()
    {
        return view('public.about');
    }

    public function services()
    {
        return view('public.services');
    }

    public function doctors()
    {
        return view('public.doctors');
    }

    public function blogs()
    {
        return view('public.blogs');
    }

    public function blog()
    {
        return view('public.blog');
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function reserve(SaveAppointement $request)
    {
        //Get keys from the checkbox array where value is on
        $inputData = $request->input();
        $key = array_keys($inputData,'on');
        $service ='';

        //Storing array values to single string variable
        for ($x = 0; $x < count($key); $x++) {
            $service .= $key[$x];
            if($x< count($key)-1) {
                $service .= ',';
            }
        }

        //Format input date to YYMMDD
        $inputDate = $request->input('date');
        $inputDate = str_replace("/","",$inputDate);

        $carbonDate  = Carbon::createFromFormat('mdY',$inputDate);
        $carbonDate  = $carbonDate->format('Y-m-d');

       //Format time
        $inputTime = $request->input('time');
        $inputTime = preg_replace('/\s*:\s*/', ':', $inputTime);

        $time = date("H:i", strtotime($inputTime));


        $appointment = new Appointment();
        $appointment->name = $request->input('name');
        $appointment->email = $request->input('email');
        $appointment->date = $carbonDate;
        $appointment->time = $time;
        $appointment->phone_no = $request->input('phone');
        $appointment->service = $service;

        $appointment->save();

    }

}
