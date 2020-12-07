<?php

use App\Constants\PageTitle;

$title = $user->fullname();

?>

@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="my-20 card p-3">
            <div class="justify-content-between">
                <div class="d-flex">
                    <div class="mr-5">
                        <img src="{{ $user->avatar_url ?? asset('images/avatar/avatar.svg') }}" width="150" height="150">
                    </div>
                    <div class="pt-3">
                        <div class="mb-2">
                            <span class="font-size-nm font-w600">Account State</span><br>
                            @include('partials.shared.status-badge', ['status' => $user->caregiver->status])
                        </div>
                        <div class="font-size-lg font-w600">
                            {{ $user->fullname() }}
                        </div>
                        <div class="mt-2">
                            <div class="dropdown show">
                                <a class="btn btn-sm btn-outline-dark font-size-nm" href="#"
                                   role="button" id="actionsLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                    <span class="iconify" data-icon="bx:bxs-chevron-down" data-inline="false"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="actionsLink">
                                    <a class="dropdown-item font-size-nm" href="{{route('dashboard.settings')}}">Edit Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row py-20">
            <div class="col-md-6 mb-4">
                <div class="card p-3 h-100">
                    <div class="">
                        <div class="font-w600 font-size-lg text-muted text-uppercase">Basic Details</div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="text-uppercase font-w600">
                                FirstName
                            </div>
                            <div>
                                {{$user->firstname}}
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="text-uppercase font-w600">
                                LastName
                            </div>
                            <div>
                                {{$user->lastname}}
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="text-uppercase font-w600">
                                Email
                            </div>
                            <div>
                                {{$user->email}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card p-3 h-100">
                    <div class="">
                        <div class="font-w600 font-size-lg text-muted text-uppercase">Bio</div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="text-uppercase font-w600">
                                Bio
                            </div>
                            <div>
                                {{$user->caregiver->bio}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card p-3">
                    <div class="">
                        <div class="font-w600 font-size-lg text-muted text-uppercase">Contact and Address</div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="text-uppercase font-w600">
                                Street Address 1
                            </div>
                            <div>
                                {{$user->caregiver->street1}}
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="text-uppercase font-w600">
                                Street Address 2
                            </div>
                            <div>
                                {{$user->caregiver->street1 ?? '-'}}
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="text-uppercase font-w600">
                                City
                            </div>
                            <div>
                                {{ $user->caregiver->city ? $user->caregiver->city->city : '' }}
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="text-uppercase font-w600">
                                State
                            </div>
                            <div>
                                {{ $user->caregiver->state ? $user->caregiver->state->state : '' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
