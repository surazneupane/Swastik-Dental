@extends('admin.layouts.main')
@section('body')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            <form action="/admin/add/{{$staff->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Edit: {{$staff->name}}:
                </h1>

                <!-- CTA -->
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    @php
                        $image = $staff->image;
                    @endphp
                    <img src="{{Storage::disk('public')->url($image['file_path'])}}"/>
                    <label class="text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Upload new Staff Image</span>
                    </label>

                    <input class="pl-8" type="file" name="staff_image" value="{{old("staff_image")}}" />
                    @error('staff_image')
                    <p class="error-text">{{$message}}</p>
                    @enderror
                </div>
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400" >Name</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="name"
                            placeholder="Name of Staff"
                            value="{{$staff->name}}"/>
                        @error('name')
                        <p class="error-text">{{$message}}</p>
                        @enderror

                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400" >Position</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="position"
                            placeholder="Position of Staff"
                            value="{{$staff->position}}"/>
                        @error('position')
                        <p class="error-text">{{$message}}</p>
                        @enderror

                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">About</span>
                        <textarea
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            rows="3"
                            name="about"
                            placeholder="About Staff"
                        >{{$staff->about}}</textarea>
                        @error('about')
                        <p class="error-text">{{$message}}</p>
                        @enderror
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400" >Twitter</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="twitter"
                            placeholder="Twitter link" value="{{$staff->twitter}}" type="url"/>
                        @error('twitter')
                        <p class="error-text">{{$message}}</p>
                        @enderror

                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400" >Facebook</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="facebook"
                            placeholder="Facebook Link" value="{{$staff->facebook}}" type="url"/>
                        @error('facebook')
                        <p class="error-text">{{$message}}</p>
                        @enderror

                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400" >Instagram</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="instagram"
                            placeholder="Instagram" value="{{$staff->instagram}}" type="url"/>
                        @error('instagram')
                        <p class="error-text">{{$message}}</p>
                        @enderror

                    </label>

                </div>
                <button class="ma-center h-8 mw-120 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600  border-transparent  active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    Done
                </button>
            </form>
        </div>
    </main>
@endsection
