<div class="my-20 card p-3">
    <div class="justify-content-between">
        <div class="d-flex">
            <div class="mr-5">
                <img src="{{ $user->caregiver->avatar_url ?? asset('images/avatar/avatar.svg') }}" width="150" height="150">
            </div>
            <div class="pt-3">
                <div class="mb-2">
                    <span class="font-size-nm font-w600">Account State</span><br>
                    @include('partials.shared.status-badge', ['status' => $user->caregiver->status])
                </div>
                <div class="font-size-lg font-w600">
                    {{ $user->fullname() }}
                </div>

                @if(auth()->user() && auth()->user()->id === $user->id)
                    <div class="mt-2">
                        <div class="dropdown show">
                        <a class="btn btn-sm btn-outline-dark font-size-nm" href="#"
                           role="button" id="actionsLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Actions
                            <span class="iconify" data-icon="bx:bxs-chevron-down" data-inline="false"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="actionsLink">
                            <a class="dropdown-item font-size-nm" href="{{route('dashboard.settings.profile')}}">Edit Profile</a>
                        </div>
                    </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<ul class="nav nav-pills mb-3 profile-navs" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a
            class="nav-link active"
            id="basic-details-tab"
            data-toggle="pill"
            href="#pills-basic-details"
            role="tab"
            aria-controls="pills-basic-details"
            aria-selected="true">
            Basic Details
        </a>
    </li>
    <li class="nav-item">
        <a
            class="nav-link"
            id="educations-tab"
            data-toggle="pill"
            href="#pills-educations"
            role="tab"
            aria-controls="pills-educations"
            aria-selected="true">
            Educations and Resume
        </a>
    </li>
</ul>

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="pills-basic-details" id="pills-basic-details">
        <div class="row py-20">
            <div class="col-md-6 mb-4">
                <div class="card p-3 h-100">
                    <div class="">
                        <div class="font-w600 font-size-lg text-muted text-uppercase">Basic Details</div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="text-uppercase font-w600">
                                FirstName
                            </div>
                            <div>
                                {{$user->firstname}}
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="text-uppercase font-w600">
                                LastName
                            </div>
                            <div>
                                {{$user->lastname}}
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="text-uppercase font-w600">
                                Email
                            </div>
                            <div>
                                {{$user->email}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card p-3 h-100">
                    <div class="">
                        <div class="font-w600 font-size-lg text-muted text-uppercase">Bio</div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="text-uppercase font-w600">
                                Bio
                            </div>
                            <div>
                                {{$user->caregiver->bio}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card p-3">
                    <div class="">
                        <div class="font-w600 font-size-lg text-muted text-uppercase">Contact and Address</div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="text-uppercase font-w600">
                                Street Address 1
                            </div>
                            <div>
                                {{$user->caregiver->street1}}
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="text-uppercase font-w600">
                                Street Address 2
                            </div>
                            <div>
                                {{$user->caregiver->street1 ?? '-'}}
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="text-uppercase font-w600">
                                City
                            </div>
                            <div>
                                {{ $user->caregiver->city ? $user->caregiver->city->city : '' }}
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="text-uppercase font-w600">
                                State
                            </div>
                            <div>
                                {{ $user->caregiver->state ? $user->caregiver->state->state : '' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" role="tabpanel" aria-labelledby="pills-educations" id="pills-educations">
        <div class="row py-20">
            <div class="col-md-6 mb-4">
                <div class="card p-3">
                    <div class="">
                        <div class="font-w600 font-size-lg text-muted text-uppercase">Educations</div>
                        <hr>
                    </div>
                    <div>
                        @forelse($user->caregiver->educations as $education)
                            <div class="border-main-bottom p-3 mb-2">
                                <div class="mr-sm-3 mb-2 mb-sm-0">
                                    <div><strong>{{ $education->school_name }}</strong></div>
                                    <div>{{ $education->degree }}</div>
                                    <div>{{ $education->discipline }}</div>
                                    <div class="font-size-nm">{{ $education->entry_year }} - {{ $education->graduation_year }}</div>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">No Education available</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card p-3">
                    <div class="">
                        <div class="font-w600 font-size-lg text-muted text-uppercase">Resume</div>
                        <hr>
                    </div>
                    <div>
                        @if($user->caregiver->resume_url)
                            <a href="{{$user->caregiver->resume_url}}">
                                {{$user->caregiver->resume_name}}
                            </a>

                        @else
                            <p class="text-muted">No Resume available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
