<?php
$header = [
    'title' =>  [
        'icon' => 'fas fa-chalkboard-teacher',
        'label' => 'Overview'
    ],
    'links' => [
        [
            'route' => route('admin.index'),
            'label' => 'Home'
        ]
    ]
]
?>

@extends('layouts.admin')

@section('content')
    <div>
        Hello
    </div>
@endsection
