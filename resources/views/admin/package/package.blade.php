@extends('admin.layouts.main')
@section('body')
    <main class="h-full pb-16 overflow-y-auto my-package">
        <div class="container px-6 mx-auto grid">
            <div class="flex justify-between">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Current Packages
                </h2>

                <a href="{{url('/admin/add-package')}}"
                   class="pt-8 h-8 mt-20 pt-8 h-8 mt-20 px-4 h-24 text-sm font-medium text-white transition-colors duration-150 bg-purple-600  border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Add Package
                    <span class="ml-2" aria-hidden="true">+</span>
                </a>

            </div>
             <div  class="package-class">
                 <table class="w-full whitespace-no-wrap">
                     <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                     @foreach($packages as $package)
                 <tr class="text-gray-700 dark:text-gray-400 h-32" >

                    <td class="px-4 py-3">{{$package->type}}</td>
                     <td class="px-4 py-3">
                     <form action="/admin/package/{{$package->id}}" method="POST">
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
             </div>

{{--            <table class="w-full whitespace-no-wrap ">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th></th>--}}
{{--                @php--}}
{{--                   $packages = \App\Models\Package::all();--}}
{{--                   $total_packages = count($packages);--}}
{{--                   $x = array();--}}
{{--                   foreach($packages as $package)--}}
{{--                   {--}}
{{--                       $id = $package->id;--}}
{{--                       $x[] = $id;--}}
{{--//                       dd($x);--}}
{{--                   }--}}

{{--                @endphp--}}
{{--                @for( $x= 1; $x <= $total_packages; $x++  )--}}
{{--                    @foreach($packages as $package)--}}
{{--                        <th>{{$package->type}}</th>--}}
{{--                    @endforeach--}}
{{--                @endfor--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tr>--}}
{{--                    <th>Price</th>--}}
{{--                    @foreach($packages as $package)--}}
{{--                    <td>{{$package->price}}</td>--}}
{{--                    @endforeach--}}
{{--                </tr>--}}


{{--                <tr>--}}
{{--                    <th>Service</th>--}}

{{--                </tr>--}}

{{--            </table>--}}
        </div>
@endsection
