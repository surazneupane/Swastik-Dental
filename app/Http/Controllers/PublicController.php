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
        $sliders = Slider::all();
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


       //Format input date to YYMMDD
        $inputDate = $request->input('date');
        $inputDate = str_replace("/","",$inputDate);

        $carbonDate  = Carbon::createFromFormat('mdY',$inputDate);
        $carbonDate  = $carbonDate->format('Y-m-d');

       //Format time
        $inputTime = $request->input('time');
        $inputTime = preg_replace('/\s*:\s*/', ':', $inputTime);

        $time = date("H:i", strtotime($inputTime));

        $appointable = new Appointable();


        $service = new Service();
        $service->name = $request->input('service');
        $service->save();



        $appointment = new Appointment();
        $appointment->name = $request->input('name');
        $appointment->email = $request->input('email');
        $appointment->date = $carbonDate;
        $appointment->time = $time;
        $appointment->phone_no = $request->input('phone');
        $appointment->save();

        $service->appointments()->create([
            'appointable_id' => $service->id,
            'appointable_type' => get_class($service),
        ]);

        $appointment->appointments()->create([
            'appointable_id' => $appointment->id,
            'appointable_type' => get_class($appointment),
        ]);


    }

}
