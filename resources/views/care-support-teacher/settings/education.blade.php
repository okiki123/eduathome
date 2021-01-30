<?php

use App\Constants\PageTitle;

$title = PageTitle::DASHBOARD_SETTINGS;

$resumeData = [
    'route' => route('dashboard.upload-resume'),
    'file' => $caregiver->resume_url ?? "",
    'name' => $caregiver->resume_name ?? ""
];

$addEducationData = [
    'id' => 'education-modal-form',
    'route' => route('dashboard.add.education'),
    'modal_title' => 'Add Education',
    'saveBtnText' => 'Save',
    'method' => 'POST',
];
?>

@extends('layouts.settings')

@section('inner-content')

    <!-- Resume -->
    <div class="resume mt-3">
        <h2 class="form-heading">
            Resume
        </h2>
        <div class="row">
            <div class="col-lg-3">
                <p class="text-muted mb-20">Upload your resume</p>
            </div>
            <div class="offset-lg-1 col-lg-7">
                <!--Rendered by react in js/components/forms/resume.jsx -->
                <div id="resume-form" data-props="{{ json_encode($resumeData) }}"></div>
            </div>
        </div>
    </div>

    <!-- Education -->
    <div class="resume mt-3">
        <h2 class="form-heading">
            Education
        </h2>
        <div class="row">
            <div class="col-lg-3">
                <p class="text-muted mb-20">What schools did you attend</p>
            </div>
            <div class="offset-lg-1 col-lg-7">
                <div class="mb-2 text-muted">
                    @forelse($caregiver->educations as $education)
                        <div class="border-main-bottom p-3 d-sm-flex mb-2 justify-content-between">
                            <div class="mr-sm-3 mb-2 mb-sm-0">
                                <div><strong>{{ $education->school_name }}</strong></div>
                                <div>{{ $education->degree }}</div>
                                <div>{{ $education->discipline }}</div>
                                <div class="font-size-nm">{{ $education->entry_year }} - {{ $education->graduation_year }}</div>
                            </div>
                            <div class="ml-sm-3 d-flex h-auto">
                                <div>
                                    <button
                                        class="btn btn-outline-primary btn-sm mr-2 table-action"
                                        data-toggle="modal"
                                        data-target="#education-modal"
                                        data-title="Edit Education"
                                        data-method="PUT"
                                        data-url="{{ route('dashboard.update.education', ['id' => $education->id]) }}"
                                        data-school_name="{{ $education->school_name }}"
                                        data-entry_year="{{ $education->entry_year }}"
                                        data-graduation_year="{{ $education->graduation_year }}"
                                        data-degree="{{ $education->degree }}"
                                        data-discipline="{{ $education->discipline }}"
                                    >
                                        Edit
                                    </button>
                                </div>
                                <div>
                                    <button
                                        class="btn btn-outline-danger btn-sm table-action"
                                        data-toggle="modal"
                                        data-target="#delete-education"
                                        data-id="{{ $education->id }}"
                                        data-url="{{ route('dashboard.delete.education', ['id' => $education->id]) }}"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <span>You don't have any education</span>
                    @endforelse
                </div>
                <div>
                    <button
                        class="btn btn-primary btn-standard mt-3 font-w600 add-btn"
                        type="button"
                        data-toggle="modal"
                        data-target="#education-modal"
                        data-title="Add Education"
                        data-method="POST"
                        data-url="{{ route('dashboard.add.education') }}"
                    >
                        Add Education
                    </button>
                </div>
            </div>
        </div>

        @include('partials.modals.education-modal', [
            'id' => 'education-modal',
            'route' => route('dashboard.add.education'),
            'modal_title' => 'Add Education',
            'saveBtnText' => 'Save',
            'method' => 'POST',
        ])

        @include('partials.shared.confirm-modal', [
            'id' => 'delete-education',
            'url' => '',
            'title' => 'Delete Education',
            'content' => 'Are you sure you want to delete this education?',
            'saveBtnText' => 'Delete',
            'method' => 'DELETE',
            'attributes' => [
                'id'
            ]
        ])
    </div>

@endsection
