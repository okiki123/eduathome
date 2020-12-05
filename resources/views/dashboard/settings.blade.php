<?php

use App\Constants\PageTitle;

$title = PageTitle::DASHBOARD_SETTINGS;

$basicData = [
    'route' => route('dashboard.update.basic-details'),
    'data' => auth()->user() ?? old()
];

$contactData = [
    'route' => route('dashboard.update.contact-details'),
    'data' => old(),
    'caregiver' => $caregiver,
    'states' => $states,
    'cities' => $cities
];

$passwordData = [
    'route' => route('dashboard.update.password')
];

$bioData = [
    'route' => route('dashboard.update.bio-resume'),
    'data' => $caregiver ?? old()
];

?>

@extends('layouts.dashboard')

@section('content')
    <div class="mx-auto mxw-1200 settings p-3 pt-0">
        <div class="image my-20">
            <div class="text-center">
                <img src="{{ asset('images/avatar/avatar.svg') }}" width="150" height="150">
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-sm btn-link mt-1 font-size-sm" title="Change avatar">Change</button>
            </div>
        </div>

        <div class="card box-shadow p-20 mb-4 pb-5">

            <!-- Basic Details -->
            <div class="email">
                <h2 class="form-heading">
                    Basic Details
                </h2>
                <div class="row">
                    <div class="col-lg-3">
                        <p class="text-muted mb-20">Your basic details will be publicly visible.</p>
                    </div>
                    <div class="offset-lg-1 col-lg-7">
                        <!--Rendered by react in js/components/forms/basic-details-form.jsx -->
                        <div id="settings-basic-details" data-props="{{ json_encode($basicData) }}"></div>
                    </div>
                </div>
            </div>

            <!-- Bio and Resume -->
            <div class="email">
                <h2 class="form-heading">
                    Bio and Resume
                </h2>
                <div class="row">
                    <div class="col-lg-3">
                        <p class="text-muted mb-20">Tell us about yourself.</p>
                    </div>
                    <div class="offset-lg-1 col-lg-7">
                        <!--Rendered by react in js/components/forms/basic-details-form.jsx -->
                        <div id="bio-and-resume" data-props="{{ json_encode($bioData) }}"></div>
                    </div>
                </div>
            </div>

            <!-- Contact and Address -->
            <div class="personal-details">
                <h2 class="form-heading">
                    Contact and Address
                </h2>
                <div class="row">
                    <div class="col-lg-3">
                        <p class="text-muted mb-20">Your personal information to verify your Identity.</p>
                    </div>
                    <div class="offset-lg-1 col-lg-7">
                        <!--Rendered by react in js/components/forms/settings-password-form.jsx -->
                        <div id="settings-contact-details" data-props="{{ json_encode($contactData) }}"></div>
                    </div>
                </div>
            </div>

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

        </div>
    </div>
@endsection
