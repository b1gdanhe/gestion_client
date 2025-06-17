<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Clients</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Myrathemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- Icons css  (Mandatory in All Pages) -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App css  (Mandatory in All Pages) -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css">
    @vite('resources/css/app.css')

</head>

<body>

    <div class="wrapper">

        <!-- Start Sidebar -->
        @include('partials.sidebar')
        <!-- End Sidebar -->

        <!-- Start Page Content here -->
        <div class="page-content">

            <!-- Topbar Start -->
            @include('partials.header')

            <!-- Topbar End -->

            <main>
                @yield('admin-content')
            </main>

            <!-- Footer Start -->
            @include('partials.footer')

            <!-- Footer End -->

        </div>
        <!-- End Page content -->

    </div>

    <!-- Plugin Js (Mandatory in All Pages) -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>

    <!-- App Js (Mandatory in All Pages) -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Apexcharts js -->
    <script src="{{ asset('assets/libs/morris.js/morris.min.js') }}"></script>

    <!-- Morris Js Chart -->
    <script src="{{ asset('assets/libs/morris.js/morris.min.js') }}"></script>

    <script src="{{ asset('assets/libs/morris.js/morris.min.js') }}"></script>

    <!-- Dashboard Project Page js -->
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

</body>

</html>
