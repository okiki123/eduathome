<div class="settings-side bg-white shadow-sm mb-4 mb-lg-0">
    <div class="list-group list-group-flush">
        <a
            href="{{ route('dashboard.settings.profile') }}"
            class="list-group-item list-group-item-action
                   {{ \Illuminate\Support\Facades\Route::currentRouteName() === 'dashboard.settings.profile' ? 'bg-light' : '' }}">
            <i class="fas fa-user mr-3"></i>
            Profile
        </a>
        <a href="#" class="list-group-item list-group-item-action">
            <i class="fas fa-university mr-3"></i>
            Education
        </a>
        <a href="#" class="list-group-item list-group-item-action">
            <i class="fas fa-file-alt mr-3"></i>
            Certifications
        </a>
        <a href="{{ route('dashboard.settings.account') }}"
           class="list-group-item list-group-item-action
                    {{ \Illuminate\Support\Facades\Route::currentRouteName() === 'dashboard.settings.account' ? 'bg-light' : '' }}">
            <i class="fas fa-user-lock mr-3"></i>
            Account
        </a>
    </div>
</div>
