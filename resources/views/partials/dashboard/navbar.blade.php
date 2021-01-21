<nav class="navbar navbar-expand-lg fixed-top navbar-light dashboard-nav">
    <div class="container">
        <a class="navbar-brand" href="/">
            @include('partials.shared.logo', ['size' => 30, 'weightClass' => 'font-w500'])
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item ml-1">
                    <a class="nav-link {{ \Illuminate\Support\Facades\Route::currentRouteName() === 'dashboard.index' ? 'active' : '' }}"
                        href="{{ route('dashboard.index') }}">
                        <i class="fas fa-tachometer-alt mr-1"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item ml-1">
                    <a class="nav-link"
                       href="#">
                        <i class="fas fa-wallet mr-1"></i>
                        <span>Earnings</span>
                    </a>
                </li>
            </ul>

            <!-- Dropdown -->
            <div class="dropdown mr-1">
                <button class="btn text-white font-size-nm bg-transparent dropdown-btn font-w600"
                    type="button" id="userOptions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->firstname }}
                    <span class="iconify" data-icon="bx:bxs-chevron-down" data-inline="false"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-memu-user mnw-200px" aria-labelledby="userOptions">
                    <a class="dropdown-item disabled text-center font-size-nm font-w600 py-10 text-uppercase">{{auth()->user()->fullname()}}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item font-size-nm my-2" href="{{ route('dashboard.profile', ['id' => auth()->user()->id]) }}">
                        <span class="iconify mr-2" data-icon="simple-line-icons:user" data-inline="false"></span>
                        Profile
                    </a>
                    <a class="dropdown-item font-size-nm my-2" href="{{ route('dashboard.settings.profile') }}">
                        <span class="iconify mr-2" data-icon="simple-line-icons:wrench" data-inline="false"></span>
                        Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <form class="dropdown-item font-size-nm" action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn p-0">
                            <span class="iconify mr-2" data-icon="simple-line-icons:logout" data-inline="false"></span>
                            Sign out
                        </button>
                    </form>
                </div>
            </div>

            <!-- Notifications -->
            <div class="dropdown mr-4">
                <button class="btn text-white nm-size bg-transparent" type="button" id="notificationOptions"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Notifications">
                    <span class="iconify font-size-xl" data-icon="clarity:notification-line" data-inline="false"></span>
                    @if(count(auth()->user()->unreadNotifications))
                        <span class="badge bg-secondary"> {{ count(auth()->user()->unreadNotifications) }} </span>
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-notification notifications-dropdown" aria-labelledby="notificationOptions">
                    <a class="dropdown-item disabled font-size-nm text-center py-10 font-w600 text-uppercase">Notifications</a>
                    <div class="dropdown-divider"></div>

                    @forelse(auth()->user()->unreadNotifications as $notification)
                        <a class="dropdown-item d-flex justify-content-between font-size-nm"
                           href="{{ json_decode($notification->data)->url . '?notification=' . $notification->id }}">
                            {{ json_decode($notification->data)->message }}
                        </a>
                    @empty
                        <span class="dropdown-item font-size-nm disabled">You dont have any unread notifications</span>
                    @endforelse
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-center font-size-nm" href="#">
                        <i class="fas fa-flag"></i> &nbsp;
                        View All
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
