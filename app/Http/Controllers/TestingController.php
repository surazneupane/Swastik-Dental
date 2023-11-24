<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\AppointmentMade;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    //
    public function store()
    {
        $users = User::where('name','Admin')->get();
//        dd($testNotification);

        foreach($users as $user) {
            $user->notify(new AppointmentMade());

//            dd($user->notifications);
            foreach($user->notifications as $notification){
                dd($notification->type == 'App\Notifications\AppointmentMade');
            }
        }

    }



}
