@extends('admin.layouts.main')
@section('body')

<a href="{{url()->previous()}}" class="text-blue-500">Return Back to inbox</a>
<h2 class="dark:text-gray-300 font-semibold text-base">{{$message->name}}</h2>
<h3 class="dark:text-gray-300 font-semibold text-base">{{$message->phone}}</h3>
<h4 class="dark:text-gray-300 text-lg">{{$message->subject}}</h4>
<h5 class="dark:text-gray-300 text-lg">{{$message->body}}</h5>
<p class=" "></p>

@endsection
