@extends('layouts.email')

@section('contents')
    <h3>Hi {{ $firstName }},</h3>
    <p>
        We're happy you signed up for Edu@Home, to start exploring the platform, please confirm your email
    </p>
    <div>
        <a class="action-button" href="{{ $verificationLink }}">
            Verify now
        </a>
    </div>

    <p>Kind Regards,</p>
    <p>Edu@Home</p>
@endsection
