@extends('layouts.dashboard')

@section('content')
    <div class="mx-auto mxw-1200 settings p-1 p-sm-3 pt-0">
        <div class="row mx-0 mt-lg-5 mt-3">
            <div class="col-lg-3">
                @include('partials.dashboard.sidenav')
            </div>

            <div class="col-lg-9">
                <div class="card box-shadow px-20 mb-4 pb-5">

                    @yield('inner-content')

                </div>
            </div>
        </div>
    </div>
@endsection
