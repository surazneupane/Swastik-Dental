@extends('admin.layouts.main')
@section('body')
    <h2>Edit page</h2>
{{--    @php--}}
{{--    dump($package);--}}
{{--    dd($service);--}}
{{--    @endphp--}}
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            <form action="/admin/edit/{{$package->id}}" method="post" >
                @csrf
                @method('Put')
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Edit Package: {{$package->name}}
                </h2>


                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400" >Package type</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="package_type"
                            placeholder="Type of package." value="{{$package->type}}"/>
                        @error('package_type')
                        <p class="error-text">{{$message}}</p>
                        @enderror

                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400" >Price in <em>Npr.</em></span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="price"
                            placeholder="Price" type ="number" value="{{$package->price}}"/>
                        @error('price')
                        <p class="error-text">{{$message}}</p>
                        @enderror

                    </label>
                    @foreach($services as $service)
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400" >Service Name:</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="service_name[]"
                            placeholder="Name of service"  value="{{$service->name}}"/>
                        @error('service_name')
                        <p class="error-text">{{$message}}</p>
                        @enderror
                    </label>
                    @endforeach
                </div>
                <button class="ma-center h-8 mw-120 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600  border-transparent  active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                    Done
                </button>
            </form>
        </div>
    </main>
@endsection
