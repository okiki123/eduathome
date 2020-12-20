<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Admin' }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Iconify -->
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

@include('partials.shared.toastr')

<div id="app" class="admin-pages">

    @include('partials.admin.sidebar')

    <div class="main-nav">
        <div class="px-3">

            <!-- Nav -->
            <div class="py-20 px-3 d-flex justify-content-between justify-content-xl-end align-items-center">
                <button class="btn bg-transparent toggle-sidebar d-block d-xl-none">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="d-flex">
                    <div class="dropdown">
                        <div class="d-flex justify-content-between cursor-pointer align-items-center mr-4" id="navbarAdminDropdown"
                             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('images/avatar/avatar.svg') }}" width="40" height="40">
                        </div>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarAdminDropdown">
                            <form class="dropdown-item font-size-nm" action="{{ route('admin.logout') }}" method="post">
                                @csrf
                                <button class="btn p-0" type="submit">
                                    <span class="iconify mr-2" data-icon="simple-line-icons:logout" data-inline="false"></span>
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header -->
            @include('partials.admin.header', ['header' => $header])

            <main>
                @yield('content')
            </main>

        </div>
    </div>

    <div class="backdrop"></div>
</div>
</body>
</html>
