@extends('admin.layouts.main')

@section('body')
  <div class="add-service">
    <h2 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300 ml-6" >Services:</h2>

    <form action="/admin/add/services" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Text Input -->
        <div class="form-group">
           <label for="textInput">Service Title&colon;</label>
           <input type="text" id="textInput" name="title" placeholder="Enter text here" value="">
            @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
           <label for="textareaInput">About Service&colon;</label>
           <textarea id="textareaInput" name="description" rows="4" cols="50" placeholder="Enter text here"></textarea>
            @error('description')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
           <label for="icon-upload">Icon Upload&colon;</label>
           <input type="file" id="icon-upload" name="icon">
            @error('file')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <!-- Submit Button -->
        <input type="submit" value="Submit">
    </form>
  </div>
@endsection
