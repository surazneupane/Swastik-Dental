@extends('admin.layouts.main')
@section('body')
    <ul>

    @unless($notifications->isEmpty())
       <h2>Notifications:</h2>
    @foreach($notifications as $notification)

         <li>
             @if ($notification->type == 'App\Notifications\AppointmentMade')

                <p> New appointment is made by <span>{{$notification->data['name']}}</span></p>
             @endif
             @if ($notification->type == 'App\Notifications\SendMessageSuccessful')
                 <p>New message received from <span>{{$notification->data['name']}}</span></p>
             @endif
         </li>
      @endforeach
        @else
        <li>
                <p>There is no new notification</p>
        </li>
        @endunless
    </ul>
@endsection

