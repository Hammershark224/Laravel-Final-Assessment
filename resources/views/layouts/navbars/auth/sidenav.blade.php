{{-- BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CB21133
Student Name: CHONG XUE LIANG --}}
@php
    $role = Auth::user()->role;
@endphp

<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}" target="_blank">
            <img src="{{ asset('img/FKKMS favicon.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">PMMS</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- dashboard side nav -->
            
            @if ($role == "admin")
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'booth') == true ? 'active' : '' }}" href="{{ route('booth.indexAdmin') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-basket text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Booth</span>
                </a>
                <a class="nav-link {{ str_contains(request()->url(), 'application') == true ? 'active' : '' }}" href="{{ route('application.adminManage') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bag-17 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Application</span>
                </a>
                <a class="nav-link {{ str_contains(request()->url(), 'response') == true ? 'active' : '' }}" href="{{ route('response') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-basket text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Complaint & Response</span>
                </a>
            </li>
            @endif

            @if ($role == "vendor")
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'booth') == true ? 'active' : '' }}" href="{{ route('booth.show') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-basket text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Booth</span>
                </a>
                <a class="nav-link {{ str_contains(request()->url(), 'application') == true ? 'active' : '' }}" href="{{ route('application.manage') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bag-17 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Application</span>
                </a>
                <a class="nav-link {{ str_contains(request()->url(), 'complaint') == true ? 'active' : '' }}" href="{{ route('complaint.manage') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chat-round text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Complaints</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</aside>