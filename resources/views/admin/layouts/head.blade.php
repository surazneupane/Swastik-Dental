<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name') }} Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/css/tailwind.output.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/css/custom.css') }}" />
    <script src="{{ asset('admin/js/alpinejs/dist/alpine.js') }}"></script>
    <script src="{{ asset('admin/js/init-alpine.js') }}"></script>
{{--    <script src="//unpkg.com/alpinejs" defer></script>--}}
</head>

