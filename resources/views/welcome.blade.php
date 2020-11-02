<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body class="landing-page">

        @include('partials.landing-page.banner')

        @include('partials.landing-page.how-it-works')

        @include('partials.landing-page.caregiver-action')

        <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    </body>
</html>
