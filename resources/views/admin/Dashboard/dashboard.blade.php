@extends('admin.layouts.main')
@section('body')
    <ul>

    @unless($notifications->isEmpty())
       <h2 class=" mb-40 text-lg font-semibold text-gray-600 dark:text-gray-300 ml-6 my-6" >Notifications:</h2>
    @foreach($notifications as $notification)

         <li>
             @if ($notification->type == 'App\Notifications\AppointmentMade')

                <p class="my-15 bg-purple-600 mw-80 ma-center mb-10 h-12 light-purple-100 pt-9 pl-15"> New appointment is made by <span class="decoration-solid">{{$notification->data['name']}}.</span></p>
             @endif
             @if ($notification->type == 'App\Notifications\SendMessageSuccessful')
                 <p class="my-15 bg-purple-600 mw-80 ma-center mb-10 h-12 light-purple-100 pt-9 pl-15">New message received from <span class="decoration-solid">{{$notification->data['name']}}.</span></p>
             @endif
         </li>
      @endforeach
        @else
        <li>
                <p class="empty-message">Sorry, No activities recently.</p>
        </li>
        @endunless
    </ul>
@endsection

