<?php
$header = [
    'title' => [
        'icon' => 'fas fa-chalkboard-teacher',
        'label' => 'Care Support Teachers'
    ],
    'links' => [
        [
            'route' => route('admin.index'),
            'label' => 'Home'
        ],
        [
            'route' => '',
            'label' => 'Care Support Teachers'
        ],
    ]
]
?>

@extends('layouts.admin')

@section('content')
    <div class="bg-white p-3 mt-3">
        {{ $table }}
    </div>

    @include('partials.shared.confirm-modal', [
        'id' => 'approve-care-support-teacher',
        'url' => '',
        'title' => 'Approve Care Support Teacher',
        'content' => 'Are you sure you want to approve this care support teacher',
        'saveBtnText' => 'Approve',
        'attributes' => [
            'status'
        ]
    ])
@endsection
