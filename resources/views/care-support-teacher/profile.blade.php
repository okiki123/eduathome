<?php

use App\Constants\PageTitle;

$title = $user->fullname();

?>

@extends('layouts.dashboard')

@section('content')
    <div class="container">
        @include('partials.shared.profile')
    </div>
@endsection
