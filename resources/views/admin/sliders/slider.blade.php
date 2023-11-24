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

            </div>
        </div>
        </div>
    </main>
@endsection
