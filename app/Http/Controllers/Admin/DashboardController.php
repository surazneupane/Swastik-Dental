<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterAppointmentRequest;
use App\Models\Appointment;
use App\Models\Slider;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function show()
    {

        return view('admin.sliders.dashboard', [
            'sliders' => Slider::with('image')->get()
        ]);
    }

    public function appointment()
    {
        $appointment = Appointment::orderBy('date', 'asc')->get();
        return view('admin.appointment.appointment', [
            'appointments' => $appointment
        ]);
    }

    public function filter(Request $request)
    {
//            $starting_time = $request->starting_time;
//            $ending_time = $request->ending_time;
//
//
//
////            $starting_time = preg_replace('/\s*:\s*/', ':', $starting_time);
////            $ending_time = preg_replace('/\s*:\s*/', ':', $ending_time);
//
//            $starting_time = date("H:i", strtotime($starting_time));
//            dd($starting_time);
////            $starting_time .= ':00';
//
//            $ending_time = date("H:i", strtotime($ending_time));
////            $ending_time .= ':00';
//
////            dd($starting_time,$ending_time);
//
//
//        $appointment = Appointment::where('time', '>=', '10:00:00')->get();
//
//        dd($appointment);



        $appointment = Appointment::where(function ($query) use ($request) {



            if (!empty($request->starting_time) && !empty($request->ending_time)) {
                $starting_time = $request->starting_time;
                $starting_time = date("H:i:s", strtotime($starting_time));

                $ending_time = $request->ending_time;
                $ending_time = date("H:i:s", strtotime($ending_time));

                $query->where('time', '>=', $starting_time);
                $query->where('time', '<=', $ending_time);

            }

            if (!empty($request->starting_date) && !empty($request->ending_date)) {
                $query->where('date', '>=', $request->starting_date);
                $query->where('date', '<=', $request->ending_date);
            }
        })->get();

        return view('admin.appointment.appointment', [
            'appointments' => $appointment]);

    }
}

