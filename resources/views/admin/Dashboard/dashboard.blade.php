@extends('admin.layouts.main')
@section('body')
    <ul>

    @unless($notifications->isEmpty())
       <h2 class=" mb-40 text-lg font-semibold text-gray-600 dark:text-gray-300 ml-6 my-6" >Notifications:</h2>
    @foreach($notifications as $notification)
{{--    @php--}}
{{--      dd($notification->id);--}}
{{--    @endphp--}}
         <li>
             @if ($notification->type == 'App\Notifications\AppointmentMade')

                 <p class="my-15 bg-purple-600 mw-80 ma-center mb-10 h-12 light-purple-100 pt-9 pl-15"> New appointment is made by <span class="decoration-solid">{{$notification->data['name']}}.</span></p>
                 <form action="/admin/mark-as-read/{{$notification->id}}" method="POST">
                     @csrf
{{--                     @method('Post')--}}
                       <input type="hidden" name="notification" value="{{ $notification->id }}">
                       <button type="submit">Mark as read</button>
                 </form>
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

