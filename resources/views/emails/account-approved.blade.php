@extends('layouts.email')

@section('contents')
    <h3>Congratulations {{ $firstName }},</h3>

    <p>
        Your account has been approved, you will start appearing in our parent's searches and get a client soon.
    </p>

    <p>Kind Regards,</p>
    <p>Edu@Home</p>
@endsection
