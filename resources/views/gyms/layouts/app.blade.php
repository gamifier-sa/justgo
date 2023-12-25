<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('Dashboard') }} - @yield('page_title', 'Index') </title>

    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/sections.css" />
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/roles.css" />

    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/bootstrap.rtl.min.css" />
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/bootstrap.rtl.min.css.map" />
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/global.css" />

    <!-- only for page -->
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/homePage.css" />
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/new-user.css" />
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('dashboard/') }}/css/pagination.css" />

    @stack('styles')

</head>

<body dir="rtl">
    <div class="layout">
        @include('gyms.layouts.navbar')
        <main>

            @yield('content')

        </main>

    </div>

    <script src="{{ asset('dashboard/') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dashboard/') }}/js/bootstrap.bundle.min.js.map"></script>
    <script src="{{ asset('dashboard/') }}/js/jquery.min.js"></script>
    <script src="{{ asset('dashboard/') }}/js/scripts.js"></script>

    @stack('scripts')
</body>

</html>
