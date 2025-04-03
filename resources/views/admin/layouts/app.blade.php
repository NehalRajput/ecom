<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('AdminLinks/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLinks/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLinks/assets/css/style.css') }}">
</head>
<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        <div class="container-fluid page-body-wrapper">
            @include('admin.navbar')
            <div class="main-panel">
                @yield('content')
                @include('admin.footer')
            </div>
        </div>
    </div>

    <script src="{{ asset('AdminLinks/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('AdminLinks/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('AdminLinks/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('AdminLinks/assets/js/misc.js') }}"></script>
    <script src="{{ asset('AdminLinks/assets/js/settings.js') }}"></script>
    <script src="{{ asset('AdminLinks/assets/js/todolist.js') }}"></script>
</body>
</html>