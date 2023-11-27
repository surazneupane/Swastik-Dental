<?php

namespace App\Http\Controllers;


use App\Http\Requests\SaveAppointement;
use App\Http\Requests\SendMessageRequest;
use App\Mail\AppointmentSuccessfulMail;
use App\Models\Appointment;
use App\Models\Message;
use App\Models\Package;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Staff;
use App\Models\Testimony;
use App\Models\User;
use App\Notifications\SendMessageSuccessful;
use Carbon\Carbon;
use Illuminate\Notifications\Notification;
use App\Notifications\AppointmentMade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    //

    public function show()
    {
//        $sliders = Slider::all();
//        $service = Service::all();
        return view('public.index',[
            'sliders' => Slider::with('image')->get(),
             'services' =>Service::with('image')->get(),
            'staffs' => Staff::with('image')->get(),
            'statements' => Testimony::with('image')->get(),
            'packages' => Package::all()
        ]) ;
    }


    public function about()
    {
        return view('public.about',[
            'statements' => Testimony::with('image')->get(),
        ]);
    }

    public function services()
    {
        return view('public.services',[
            'services' =>Service::with('image')->get(),
            'packages' => Package::all()
        ]);
    }

    public function doctors()
    {
        return view('public.doctors',[
            'staffs' => Staff::with('image')->get(),
            'packages' => Package::all()
        ]);
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

        if($request->input('email') != null){
         Mail::to($request->input('email'))->send(new AppointmentSuccessfulMail() );
        }

         User::where('name','Admin')->get()->first()->notify(new AppointmentMade($appointment));


        return redirect('/')->with('message','Appointment made successfully');
    }
    public function send(SendMessageRequest $request){
//        dd($request);
        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->subject = $request->subject;
        $message->body = $request->body;
        $message->save();

        User::where('name','Admin')->get()->first()->notify(new SendMessageSuccessful($message));

        return redirect('/')->with('message','Message sent successfully');
    }

}
