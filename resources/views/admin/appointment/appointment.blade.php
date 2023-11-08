@extends('admin.layouts.main')
@section('body')
    <h1
        class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
    >
        Appointments Made:
    </h1>
<main class="h-full pb-16 overflow-y-auto">

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <div class="filter">
                <form method="post" action="/appointment/filter" >
                    @csrf
                <h2>Filter appointment:</h2>
                <div>
{{--                    <div>--}}
{{--                        <h3>Service</h3>--}}
{{--                        <ul>--}}
{{--                            <li><input type="checkbox" name="whitening">Teeth Whitening</li>--}}
{{--                            <li><input type="checkbox"  name="cleaning">Teeth Cleaning</li>--}}
{{--                            <li><input type="checkbox"  name="brackets">Quality Brackets</li>--}}
{{--                            <li><input type="checkbox" name="anesthetic">Modern Anesthetic</li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                    <div>
                        <h3>Date</h3>
                        <label for="from_date">From</label>
                        <input type="date" id="from_date" name="from_date">
                        <label for="to_date">To</label>
                        <input type ="date" id ="to_date" name="to_date">
                    </div>
                    <div>
                        <h3>Time</h3>
                        <label for ="starting_time">From</label>
                        <input type="time" id="starting_time" name="starting_time">
                        <label for = "ending_time">To</label>
                        <input type="time" id="ending_time" name="ending_time">
                    </div>
                </div>
                 <button type="submit">Filter</button>
                </form>
            </div>

            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                    <th class="px-4 py-3">Service</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Time</th>
                    <th class="px-4 py-3">Client Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Phone</th>
                </tr>
                </thead>
                <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                >
                @foreach($appointments as $appointment)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <div>
                                <p class="font-semibold">{{$appointment->service}}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                     <p>{{$appointment->date}}</p>
                    </td>
                    <td class="px-4 py-3 text-xs">
                    <p>{{$appointment->time}}</p>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <p>{{$appointment->name}}</p>
                    </td>
                    <td class="px-4 py-3">
                        <p>{{$appointment->email}}</p>
                    </td>
                    <td class="px-4 py-3">
                        <p>{{$appointment->phone_no}}</p>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>

        </div>
        <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
        >
                <span class="flex items-center col-span-3">
                  Showing 21-30 of 100
                </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                  <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                      <li>
                        <button
                            class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                            aria-label="Previous"
                        >
                          <svg
                              class="w-4 h-4 fill-current"
                              aria-hidden="true"
                              viewBox="0 0 20 20"
                          >
                            <path
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"
                                fill-rule="evenodd"
                            ></path>
                          </svg>
                        </button>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          1
                        </button>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          2
                        </button>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          3
                        </button>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          4
                        </button>
                      </li>
                      <li>
                        <span class="px-3 py-1">...</span>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          8
                        </button>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          9
                        </button>
                      </li>
                      <li>
                        <button
                            class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                            aria-label="Next"
                        >
                          <svg
                              class="w-4 h-4 fill-current"
                              aria-hidden="true"
                              viewBox="0 0 20 20"
                          >
                            <path
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"
                                fill-rule="evenodd"
                            ></path>
                          </svg>
                        </button>
                      </li>
                    </ul>
                  </nav>
                </span>
        </div>
    </div>
</main>
@endsection
