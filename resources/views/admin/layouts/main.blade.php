@include('admin.layouts.head')
<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('admin.layouts.sidebar')
        <div class="flex flex-col flex-1 w-full">
            @include('admin.layouts.header')
            @yield('body')
        </div>
    </div>
<x-flash-message/>
</body>
</html>
