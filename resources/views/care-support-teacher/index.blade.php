<?php

use App\Constants\PageTitle;

$title = PageTitle::CARE_SUPPORT_TEACHERS;

$data = [
    'states' => $states,
    'state' => $state,
    'cities' => $cities,
    'city' => $city,
    'action' => route('care-support-teachers.index')
];

$tutors = [
    [
        'fullname' => 'Peter Ayinde',
        'bio' => 'cool calm and collected',
        'state' => 'Tenesse',
        'city' => 'Memphis'
    ],
    [
        'fullname' => 'Peter Ayinde',
        'bio' => 'cool calm and collected',
        'state' => 'Tenesse',
        'city' => 'Memphis'
    ],
    [
        'fullname' => 'Peter Ayinde',
        'bio' => 'cool calm and collected',
        'state' => 'Tenesse',
        'city' => 'Memphis'
    ],
    [
        'fullname' => 'Peter Ayinde',
        'bio' => 'cool calm and collected',
        'state' => 'Tenesse',
        'city' => 'Memphis'
    ],
];

?>

@extends('layouts.auth')

@section('content')
    <div class="w-100 tutors-page mb-5">
        <div class="mxw-1200 mx-auto">
            <div class="row mx-0">
                <div class="col-lg-3">
                    <div class="bg-white border-main p-3">
                        <div class="header text-center font-w600 border-main-bottom pb-2 mb-3">
                            Filter Tutors
                        </div>

                        <!-- Render by react component in resources/js/components/forms/filter-tutor-form.jsx -->
                        <div id="filter-tutor" data-props="{{ json_encode($data) }}"></div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="tutors pt-0 px-0 px-lg-3">
                        <div class="header font-size-lg mb-3">
                            {{ \App\Constants\StaticContents::CAREGIVER . 's' }}
                        </div>

                        <div class="bg-white  border-main p-3">
                            <ul class="list-group list-group-flush">
                                @forelse($careSupportTeachers as $tutor)

                                    <li class="list-group-item border-main-bottom">
                                        <div class="d-sm-flex align-items-center">
                                            <div class="mr-sm-5 mb-2 mb-sm-0 text-center">
                                                <img src="{{ $tutor->avatar_url ?? asset('images/avatar/avatar.svg') }}"
                                                     width="100" height="100">
                                            </div>
                                            <div class="flex-grow-1 d-sm-flex justify-content-between">
                                                <div class="order-sm-2 d-flex text-center mb-2 mb-sm-0">
                                                    <div class="mr-2">
                                                        <a class="btn btn-outline-primary btn-sm w-90px" href="{{ route('care-support-teachers.show', ['id' => $tutor->user->id]) }}">
                                                            View Profile
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a class="btn btn-outline-primary btn-sm w-90px" href="{{ route('care-support-teachers.show', ['id' => $tutor->user->id]) }}">
                                                            Message
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="d-flex order-sm-1 flex-column justify-content-between text-center text-sm-left">
                                                    <div class="text-primary font-w600 text-uppercase">
                                                        {{ $tutor->user->fullname() }}
                                                    </div>
                                                    <div class="text-muted">
                                                        {{ $tutor->bio ?? '-' }}
                                                    </div>
                                                    <div class="font-size-nm text-muted font-italic mt-3">
                                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                                        <span>{{ $tutor->city ? $tutor->city->city : '-' }}, {{ $tutor->state ? $tutor->state->state : '-' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                @empty

                                    <p class="mb-0">
                                        No {{\App\Constants\StaticContents::CAREGIVER}} matches your search
                                    </p>

                                @endforelse
                            </ul>
                        </div>

                        <div class="paginations d-flex justify-content-center mt-4">
                            {{ $careSupportTeachers->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
