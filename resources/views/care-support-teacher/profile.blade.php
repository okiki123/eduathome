<?php

$title = $user->fullname();

$additionalClasses = auth()->user() == $user ? '' : 'tutors-page';

?>

@extends(auth()->user() == $user ? 'layouts.dashboard' : 'layouts.auth')


@section('content')
    <div class="container {{ $additionalClasses }}">
        @include('partials.shared.profile')
    </div>
@endsection
