<?php

use Illuminate\Support\Facades\Route;

$currentRouteName = Route::currentRouteName();

$items = [
    [
        'label' => 'Overview',
        'icon' => 'fas fa-tachometer-alt',
        'routeName' => 'admin.index'
    ],
    [
        'label' => 'Care Support Teachers',
        'icon' => 'fas fa-chalkboard-teacher',
        'routeName' => 'admin.care-support-teachers'
    ]
];

?>

<aside class="sidebar pt-3">
    <div class="px-20 py-10 mb-3 d-flex justify-content-between align-items-center" style="width: 250px">
        <div>
            @include('partials.shared.logo', ['size' => 30, 'sizeClass' => 'font-size-lg'])
        </div>

        <span class="iconify toggle-sidebar font-w600 font-size-lg d-block d-xl-none cursor-pointer" data-icon="carbon:chevron-left" data-inline="false"></span>
    </div>

    <div class="px-20 py-10 mb-4 dropdown admin-action">
        <div class="bg-white shadow-sm p-3 d-flex justify-content-between align-items-center" id="sidebarAdminDropdown"
             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="font-w600">{{ auth('admin')->user()->firstname }}</span>
            <span class="iconify" data-icon="carbon:chevron-sort" data-inline="false"></span>
        </div>
        <div class="dropdown-menu sidebarAdminDropdown" aria-labelledby="sidebarAdminDropdown">
            <form class="dropdown-item font-size-nm" action="{{ route('admin.logout') }}" method="post">
                @csrf
                <button class="btn p-0 w-100" type="submit">
                    <span class="iconify mr-2" data-icon="simple-line-icons:logout" data-inline="false"></span>
                    Sign out
                </button>
            </form>
        </div>
    </div>

    <div class="list-group list-group-flush">
        @foreach($items as $item)
                <a href="{{ route($item['routeName']) }}"
                   class="list-group-item list-group-item-action bg-transparent {{ $currentRouteName === $item['routeName'] ? 'active' : '' }}">
                    <i class="{{ $item['icon'] }} font-size-md"></i>
                    <span class="ml-2 font-size-nm">{{ $item['label'] }}</span>
                </a>
        @endforeach
    </div>
</aside>
