<?php

use App\Constants\PageTitle;

$title = PageTitle::EMAIL_SENT;

?>
@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="image text-center mb-3">
                <img src="{{ asset('images/email-verification-sent.svg') }}" width="200" height="200">
            </div>
            <div class="card">
                <div class="font-size-xl font-w600 text-center">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body font-size-lg">
                    @if (session('resent'))
                        <div class="alert alert-success close" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                        @if (session('message'))
                            <div class="alert alert-{{ session('message')['type'] }}" role="alert">
                                {{ session('message')['message'] }}
                            </div>
                        @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn font-size-lg btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
