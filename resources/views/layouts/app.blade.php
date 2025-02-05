<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KMS') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/feather/feather.css', 'resources/css/vertical-layout-light/style.css',
    'resources/css/mdi/css/materialdesignicons.min.css', 'resources/css/toastr.min.css',
    'resources/css/dataTables.dataTables.min.css', 'resources/css/bootstrap.min.css', 'resources/css/search-main.css',
    'resources/css/jquery-ui.min.css'])

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ Vite::asset('resources/images/search.png') }}" />

    <script src="{{ Vite::asset('resources/js/jquery.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/template.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/dashboard.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/jquery.validate.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/toastr.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/dataTables.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/jquery-ui.min.js') }}"></script>
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
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                        aria-labelledby="overview">
                                        <div class="row" id="container">
                                            {{ $slot }}
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
<script>
    $(document).ready(function () {
        // Initialize DataTables
        $('.table').DataTable();

        // Autocomplete setup
        $('#search').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "{{ route('search.autocomplete') }}", // Adjust the route as per your requirement
                    data: {
                        term: request.term // Send search term to server
                    },
                    success: function (data) {
                        // Populate autocomplete suggestions
                        response($.map(data, function (item) {
                            return {
                                label: item
                                    .title, // Display text in the autocomplete dropdown
                                value: item
                                    .title // The value to be set in the input when an item is selected
                            };
                        }));
                    }
                });
            },
            minLength: 2, // Minimum characters to trigger the autocomplete
        });

        // Handle form submission on Enter key press
        $('#search').on('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault();

                $.ajax({
                    url: "{{ route('search.search') }}", // Replace with the route to handle the selected item
                    method: 'POST',
                    data: {
                        term: $('#search').val(),
                        _token: '{{ csrf_token() }}' // CSRF token for security in Laravel
                    },
                    success: function (response) {
                        console.log("Item selected:", response);
                        $('#container').html(response)
                    },
                    error: function (error) {
                        console.error("Error:", error);
                    }
                });
            }
        });
    });
</script>



</html>