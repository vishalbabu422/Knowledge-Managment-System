<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Login') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- Scripts -->
    @vite(['resources/css/style.css'])
</head>

<body class="img js-fullheight" style="background-image: url({{ Vite::asset('resources/images/bg2.jpg')}});">
    {{ $slot }}
</body>

</html>