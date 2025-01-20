<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KMS') }}</title>

    <link rel="stylesheet" href="{{Vite::asset('resources/css/feather/feather.css')}}">
    <link rel="stylesheet" href="{{Vite::asset('resources/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{Vite::asset('resources/css/vertical-layout-light/style.css')}}" />

    <link rel="shortcut icon" href="{{Vite::asset('resources/images/search.png')}}" />

</head>

<body>
    <div class="container-scroller">
        <x-app-header :name="auth()->user()['name']" :email="auth()->user()['email']" />
        <div class="container-fluid page-body-wrapper">
            <x-app-sidebar />
        </div>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="home-tab">
                            {{$slot}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="{{Vite::asset('resources/js/vendor.bundle.base.js')}}"></script>
<script src="{{Vite::asset('resources/js/template.js')}}"></script>
<script src="{{Vite::asset('resources/js/dashboard.js')}}"></script>

</html>