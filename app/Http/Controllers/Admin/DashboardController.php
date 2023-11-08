<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
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

    public function appointment(){
        $appointment = Appointment::orderBy('date','asc')->get();
        return view('admin.appointment.appointment',[
               'appointments' => $appointment
            ]);
    }

    public function filter(Request $request){
//        dd($request);
        $starting_time = $request->input('starting_time');
        $ending_time = $request->input('ending_time');

        $starting_time = preg_replace('/\s*:\s*/', ':', $starting_time);
        $ending_time = preg_replace('/\s*:\s*/', ':', $ending_time);

        $starting_time = date("H:i", strtotime($starting_time));
        $starting_time .=':00';
        $ending_time = date("H:i", strtotime($ending_time));
        $ending_time .=':00';
//        dd($starting_time);
//        var_dump($ending_time);
//        die;

        $from_date = $request->from_date;
        $to_date = $request->to_date;
                $appointment  =  Appointment::where('date','>=',$from_date )
                             ->where('date','<=',$to_date)
                             ->when(!is_null($starting_time), function($query) use($starting_time){
                                 return $query->where('time','>=', $starting_time);
                             })->when(!is_null($ending_time),function($query) use($ending_time){
                                 return $query->where('time','<=',$ending_time);
                             })
                             ->get();

//        $approved = $request->approved;
//        $featured = $request->featured;
//
//        $images = Images::when(!is_null($approved), function ($query) use ($approved) {
//            return $query->where('approved', $approved);
//        })->when(!is_null($featured), function ($query) use ($featured) {
//            return $query->where('featured', $featured);
//        })->latest()->get();


//        $role = $request->input('role');
//
//        $users = DB::table('users')
//            ->when($role, function ($query) use ($role) {
//                return $query->where('role_id', $role);
//            })
//            ->get();


//                dd($appointment);
                return view('admin.appointment.appointment',[
                    'appointments' => $appointment]);

    }
}
//$content = Posts::with(array('comments' => function($query) {
//    $query->order_by('created_at', 'asc');
//}))
//    ->get();
