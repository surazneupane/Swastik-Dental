<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterAppointmentRequest;
use App\Models\Appointment;
use App\Models\MessageAppointment;
use App\Models\Slider;
use App\Notifications\AppointmentMade;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function show()
    {

        return view('admin.dashboard.dashboard',[
//            'notifications' => tap(auth()->user()->unreadNotifications)->markAsRead()
              'notifications' => auth()->user()->unreadNotifications
        ]);
    }

    public function markNotification($notificationId){
//     dd('Route is hit');
//          dd('Route is hit');

        auth()->user()
            ->unreadNotifications
            ->when($notificationId, function ($query) use ($notificationId) {
                return $query->where('id', $notificationId);
            })
            ->markAsRead();

        return response()->noContent();
    }

    public function appointment()
    {
        $appointment = Appointment::orderBy('date', 'asc')->paginate(15);
        return view('admin.appointment.appointment', [
            'appointments' => $appointment
        ]);
    }
    public function messageAppointment(){
        $appointment = MessageAppointment::orderBy('date', 'asc')->get();
        return view('admin.appointment.messageAppointment',[
            'appointments' => $appointment
        ]);
    }

    public function filter(Request $request)
    {

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

