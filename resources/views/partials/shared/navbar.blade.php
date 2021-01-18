<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

$route = Route::currentRouteName();

$authRoutes = config('custom.auth_routes');

$addClasses = Request::is('care-support-teachers*') ? 'border-main-bottom bg-white mb-4' : '';

?>

@if(in_array($route, $authRoutes))

    <nav class="navbar navbar-expand-md navbar-light bg-transparent mb-4">
        <div class="container d-flex justify-content-center">
            <a class="navbar-brand" href="{{ url('/') }}">
                @include('partials.shared.logo')
            </a>
        </div>
    </nav>

@else
    <div class="text-center covid-notice py-2">
        <h5 class="text-white">
            We follow CDC Guidelines for Covid-19
            <a class="btn btn-light btn-standard ml-3" href="https://www.cdc.gov/coronavirus/2019-nCoV/index.html">More Information</a>
        </h5>
    </div>
    <nav
        class="navbar navbar-home navbar-expand-lg bg-white navbar-light main-nav {{$addClasses}}">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                @include('partials.shared.logo')
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ $route === 'care-support-teachers.index' ? 'active' : '' }}" href="{{ route('care-support-teachers.index') }}">Find Caregiver</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>

                @auth()
                    <div>
                        <a class="btn btn-primary btn-standard font-w600" href="{{ route('dashboard.index') }}">Dashboard</a>
                    </div>
                @else
                    <div>
                        <a class="btn btn-light btn-standard font-w600" href="{{ route('login') }}">Login</a>
                        <a class="btn btn-primary btn-standard font-w600" href="{{ route('register') }}">Join</a>
                    </div>
                @endauth

            </div>
        </div>
    </nav>
@endif

