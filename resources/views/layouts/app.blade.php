<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KMS') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/feather/feather.css','resources/css/materialdesignicons.min.css','resources/css/vertical-layout-light/style.css'])
    <link rel="shortcut icon" href="{{Vite::asset('resources/images/search.png')}}" />
</head>

<body>
    <div class="container-scroller">

        <x-app-header :name="auth()->user()['name']" :email="auth()->user()['email']" />

        <div class="container-fluid page-body-wrapper">
            <x-app-sidebar />

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="home-tab">
                                <div class="tab-content tab-content-basic">
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                                        <div class="row">
                                            {{$slot}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <x-app-footer />
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
</body>

<script src="{{Vite::asset('resources/js/vendor.bundle.base.js')}}"></script>
<script src="{{Vite::asset('resources/js/template.js')}}"></script>
<script src="{{Vite::asset('resources/js/dashboard.js')}}"></script>

</html>