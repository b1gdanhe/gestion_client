<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard | Drezoc - Tailwind CSS 3 Admin Layout & UI Kit Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Myrathemes" name="author">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Icons css  (Mandatory in All Pages) -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">

    <!-- App css  (Mandatory in All Pages) -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css">
    @vite('resources/css/app.css')

</head>

<body>

    <div class="wrapper">

 

        <!-- Start Page Content here -->
        <div class="page-content">

            <main>
                @yield('auth-content')
            </main>

            <!-- Footer Start -->

            <!-- Footer End -->

        </div>
        <!-- End Page content -->

    </div>

    <!-- Plugin Js (Mandatory in All Pages) -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/preline/preline.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/iconify-icon/iconify-icon.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- App Js (Mandatory in All Pages) -->
    <script src="assets/js/app.js"></script>

    <!-- Apexcharts js -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Morris Js Chart -->
    <script src="assets/libs/morris.js/morris.min.js"></script>

    <script src="assets/libs/raphael/raphael.min.js"></script>

    <!-- Dashboard Project Page js -->
    <script src="assets/js/pages/dashboard.js"></script>

</body>

</html>
