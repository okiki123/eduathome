<?php

use App\Constants\PageTitle;
use Illuminate\Support\Facades\Route;

$title = Route::currentRouteName() === 'admin.login' ? PageTitle::ADMIN_LOGIN : PageTitle::LOGIN;
$data = [
    'route' => Route::currentRouteName() === 'admin.login' ? route('admin.authenticate') : route('login'),
    'registerRoute' => route('register'),
    'data' => old(),
    'type' => Route::currentRouteName() === 'admin.login' ? 'admin' : 'default'
]
?>

@extends('layouts.auth')

@section('content')
    <div id="login" class="w-100" data-props="{{ json_encode($data) }}"></div> <!--  Rendered by react component in resources/js/components/Login.jsx-->
@endsection
