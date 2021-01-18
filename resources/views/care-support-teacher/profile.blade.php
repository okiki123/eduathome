<?php

$title = $user->fullname();

$additionalClasses = auth()->user() && auth()->user()->email == $user->email ? '' : 'tutors-page';

?>

@extends(auth()->user() && auth()->user()->email == $user->email ? 'layouts.dashboard' : 'layouts.auth')


@section('content')
    <div class="container {{ $additionalClasses }}">
        @include('partials.shared.profile')
    </div>
@endsection
