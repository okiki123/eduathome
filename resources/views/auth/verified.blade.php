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
                    <img src="{{ $data['image'] }}" width="200" height="200">
                </div>
                <div class="card">
                    <div class="font-size-xl font-w600 text-center">{{ __($data['title']) }}</div>

                    <div class="card-body font-size-lg text-center">
                        {{ __($data['message']) }}

                        @if($data['login'])
                            <div>
                                click <a class="font-size-lg btn-link p-0 m-0 align-baseline" href="{{ route('login') }}">here</a> to login.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
