<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Videojs css -->
        <link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />
        <link href="https://unpkg.com/video.js@7/dist/video-js.min.css" rel="stylesheet" />
        <!-- City -->
        <link
            href="https://unpkg.com/@videojs/themes@1/dist/forest/index.css"
            rel="stylesheet"
        />

        <!-- App Css -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Bxslider -->
        <link href="{{ asset('css/jquery.bxslider.css') }}" rel="stylesheet">

    </head>

    <body class="">

        @yield('content')

        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    </body>
</html>
