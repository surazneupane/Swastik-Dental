@extends('admin.layouts.main')
@section('body')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            <form action="/admin/add/slider-image" method="post" enctype="multipart/form-data">
            @csrf
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Create Slider
                </h2>


            <!-- CTA -->
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Upload Image</span>
                </label>
                <input class="pl-8" type="file" name="slider-image" value="{{old("slider-image")}}" />
                @error('slider-image')
                <p class="error-text">{{$message}}</p>
                @enderror
            </div>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400" >Heading</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="heading"
                        placeholder="Your message" value="{{old("heading")}}"/>
                    @error('heading')
                    <p class="error-text">{{$message}}</p>
                    @enderror

                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Description</span>
                    <textarea
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3"
                        name="description"
                        placeholder="What this image about?" value="{{old("description")}}"
                    ></textarea>
                    @error('description')
                    <p class="error-text">{{$message}}</p>
                    @enderror
                </label>
            </div>
            <button class="ma-center h-8 mw-120 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600  border-transparent  active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
            >
                Done
            </button>
            </form>
            </div>
    </main>

@endsection
