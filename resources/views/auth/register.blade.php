<?php

use App\Constants\PageTitle;
use App\Constants\StaticContents;

$title = PageTitle::REGISTER;
$data = [
        'caregiver' => StaticContents::CAREGIVER,
        'parent' => StaticContents::PARENT,
        'route' => route('register'),
        'loginRoute' => route('login'),
        'data' => old()
]
?>

@extends('layouts.auth')

@section('content')
    <div id="register" class="w-100" data-props="{{ json_encode($data) }}"></div> <!--  Rendered by react component in resources/js/components/Register.jsx-->
@endsection
