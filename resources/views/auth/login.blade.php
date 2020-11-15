<?php

use App\Constants\PageTitle;

$title = PageTitle::REGISTER;
$data = [
    'route' => route('login'),
    'registerRoute' => route('register'),
    'data' => old()
]
?>

@extends('layouts.auth')

@section('content')
    <div id="login" class="w-100" data-props="{{ json_encode($data) }}"></div> <!--  Rendered by react component in resources/js/components/Login.jsx-->
@endsection
