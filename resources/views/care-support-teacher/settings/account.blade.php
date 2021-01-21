<?php

use App\Constants\PageTitle;

$title = PageTitle::DASHBOARD_SETTINGS;

$passwordData = [
    'route' => route('dashboard.update.password')
];

?>

@extends('layouts.settings')

@section('inner-content')

    <!-- Password -->
    <div class="password mt-3">
        <h2 class="form-heading">
            Change Password
        </h2>
        <div class="row">
            <div class="col-lg-3">
                <p class="text-muted mb-20">Changing your sign in password is an easy way to keep your account secure.</p>
            </div>
            <div class="offset-lg-1 col-lg-7">
                <!--Rendered by react in js/components/forms/settings-password-form.jsx -->
                <div id="settings-password" data-props="{{ json_encode($passwordData) }}"></div>
            </div>
        </div>
    </div>

@endsection
