@extends('admin.layouts.main')
@section('body')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            <div class="flex justify-between">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Sliders
                </h2>

                <a href="{{url('/admin/create-slider')}}"
                  class="pt-8 h-8 px-4 h-24 text-sm font-medium text-white transition-colors duration-150 bg-purple-600  border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple mt-20">
                  Add Slider
                  <span class="ml-2" aria-hidden="true">+</span>
                </a>

            </div>

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Image</th>
                                <th class="px-4 py-3">Heading</th>
                                <th class="px-4 py-3">Paragraph</th>
                                <th class="px-4 py-3">Status</th>
                                <th class = "px-4 py-3">Action</th>
                            </tr>
                        </thead>
                                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                @foreach($sliders as $slider)
                                                    <tr class="text-gray-700 dark:text-gray-400 h-32">

                                                        <td class="px-4 py-3">
                                                            <div class="flex items-center text-sm">
                                                                <!-- Avatar with inset shadow -->
                                                                <div class="relative hidden w-50 mr-3 rounded-full md:block w-">
                                                                        @php
                                                                           $image = $slider->image;
                                                                        @endphp
                                                                      <img src="{{Storage::disk('public')->url($image['file_path'])}}"/>

                                                                </div>
                                                            </div>
                                                        </td>

                                                            <td class="px-4 py-3 text-sm">
                                                                {{$slider->text->heading}}
                                                            </td>
                                                        <td class="px-4 py-3 text-sm">
                                                            {{$slider->text->description}}
                                                        </td>
                                                        <td class="px-4 py-3 text-xs">
                                                              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                                     @if($slider->status == 0)
                                                                         Publish
                                                                     @else
                                                                         Unpublish
                                                                       @endif
                                                               </span>
                                                         </td>
                                                        <td class="px-4 py-3 text-xs">
                                                            <a href="/sliders/{{$slider->id}}/edit">
                                                              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                                        Edit
                                                               </span>
                                                            </a>
                                                        </td>
                                                    </tr>
                        @endforeach
                    </table>
                </div>
{{--                <div--}}
{{--                    class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">--}}
{{--                    <span class="flex items-center col-span-3">--}}
{{--                        Showing 21-30 of 100--}}
{{--                    </span>--}}
{{--                    <span class="col-span-2"></span>--}}
{{--                    <!-- Pagination -->--}}
{{--                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">--}}
{{--                        <nav aria-label="Table navigation">--}}
{{--                            <ul class="inline-flex items-center">--}}
{{--                                <li>--}}
{{--                                    <button--}}
{{--                                        class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"--}}
{{--                                        aria-label="Previous">--}}
{{--                                        <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">--}}
{{--                                            <path--}}
{{--                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"--}}
{{--                                                clip-rule="evenodd" fill-rule="evenodd"></path>--}}
{{--                                        </svg>--}}
{{--                                    </button>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">--}}
{{--                                        1--}}
{{--                                    </button>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">--}}
{{--                                        2--}}
{{--                                    </button>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <button--}}
{{--                                        class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">--}}
{{--                                        3--}}
{{--                                    </button>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">--}}
{{--                                        4--}}
{{--                                    </button>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <span class="px-3 py-1">...</span>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">--}}
{{--                                        8--}}
{{--                                    </button>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">--}}
{{--                                        9--}}
{{--                                    </button>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <button--}}
{{--                                        class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"--}}
{{--                                        aria-label="Next">--}}
{{--                                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">--}}
{{--                                            <path--}}
{{--                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"--}}
{{--                                                clip-rule="evenodd" fill-rule="evenodd"></path>--}}
{{--                                        </svg>--}}
{{--                                    </button>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </nav>--}}
{{--                    </span>--}}
{{--                </div>--}}
            </div>
        </div>
        </div>
    </main>
@endsection
