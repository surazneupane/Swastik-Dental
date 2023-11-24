@extends('admin.layouts.main')

@section('body')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200" >Services:</h2>

            <form action="/admin/add/services" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Text Input -->
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="form-group">
                        <label for="textInput" class=" text-gray-700 dark:text-gray-400 text-sm">Service Title&colon;</label>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" id="textInput" name="title" placeholder="Enter text here" value="">
                        @error('title')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <label for="textareaInput" class=" text-gray-700 dark:text-gray-400 text-sm">About Service&colon;</label>
                        <textarea class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="textareaInput" name="description" rows="4" cols="50" placeholder="Enter text here"></textarea>
                        @error('description')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <label for="icon-upload" class=" text-gray-700 dark:text-gray-400 text-sm">Icon Upload&colon;</label>
                    <input type="file" id="icon-upload" name="icon">
                    @error('file')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <!-- Submit Button -->
                <input type="submit" value="Submit" class="ma-center h-8 mw-120 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600  border-transparent  active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            </form>
        </div>
    </main>
@endsection
