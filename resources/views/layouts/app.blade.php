<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Complaint Tracker') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="icon" type="image/ico" href="/favicon.ico">
    <link rel="icon" type="image/png" href="/favicon.png">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<div class="flex items-center justify-center h-screen">
    <div class="app" style="width: 100%; max-width: 95%;">
        <div class=" flex flex-col flex-1">
            {{ $slot }}
        </div>
        <div class="copyright">
            &copy; Copyright {{now()->format('Y')}} Pendo Management, LLC.
        </div>
    </div>

</div>
</body>
</html>
