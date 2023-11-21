@extends('admin.layouts.main')
@section('body')

    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            @unless($messages->isEmpty())
            <div class="flex justify-between">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Inbox
                </h2>

                <table class="w-full whitespace-no-wrap  ">
                    <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                        <th class="px-4 py-3">Subject</th>
                        <th class="px-4 py-3">Sender</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                    </thead>
                    <tbody
                        class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                    >
                    @foreach($messages as $message)
                        <tr class="text-gray-700 dark:text-gray-400 h-5">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <a href="{{route('admin.message.show',['id' => $message->id])}}">
                                        <p class="font-semibold">{{$message->subject}}</p>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <p>{{$message->name}}</p>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <p>{{$message->created_at}}</p>
                            </td>

                            <td class="px-4 py-3">

                                <form action="/admin/message/{{$message->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete" type="submit"
                                    >
                                        <svg
                                            class="w-5 h-5"
                                            aria-hidden="true"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                @else
                    <h2 class="empty-message">Sorry, you have no messages.</h2>
                @endunless
            </div>
        </div>
    </main>

@endsection
