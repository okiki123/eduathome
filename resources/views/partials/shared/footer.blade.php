<?php

use Illuminate\Support\Facades\Route;

$route = Route::currentRouteName();
    $authRoutes = config('custom.auth_routes');
?>

@if(in_array($route, $authRoutes))
    <footer class="main-footer p-3 font-size-nm d-flex justify-content-center">
        <div>
            <span>Copyright © 2020 </span>
            <a class="text-decoration-none text-brand--red" href="{{ url('/') }}">Edu@Home</a>
            <span> All rights reserved.</span>
        </div>
    </footer>
@else
    <footer class="footer-distributed">
    <div class="row">
        <div class="footer-left col-md-4">
            <h3 class="text-white">
                <img src="{{ asset('images/logo.jpg') }}" width="40" height="40" class="d-inline-block align-top" alt="">
                <span class="font-size-xl font-w600">Edu@Home</span>
            </h3>

            <p class="footer-links text-white">
                <a href="#">Home</a> ·
                <a href="#">Blog</a> ·
                <a href="#">Pricing</a> ·
                <a href="#">About</a> ·
                <a href="#">Faq</a> ·
                <a href="#">Contact</a>
            </p>
            <p class="footer-company-name">Edu@Home © 2020</p>
        </div>

        <div class="footer-center col-md-4 font-size-nm">
            <div>
                <i class="fa fa-map-marker-alt"></i>
                <p><span>21 Revolution Street</span> <br> Tenesse, USA</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+1 555 123456</p>
            </div>

            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:support@company.com">support@eduathome.com</a></p>
            </div>
        </div>

        <div class="footer-right col-md-4">
            <p class="footer-company-about">
                <span>About the company</span>
                Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
            </p>
            <div class="footer-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>
</footer>
@endif
