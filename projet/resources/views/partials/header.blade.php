<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'MediSlot')</title>

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    {{-- Tailwind Theme Config --}}
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#135bec",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101622",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>

    {{-- External CSS --}}
    <link href="{{ asset('css/medislot.css') }}" rel="stylesheet"/>

    @stack('styles')
</head>
<body class="bg-background-light dark:bg-background-dark min-h-screen flex flex-col font-display text-[#111318] dark:text-slate-100">

<div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">

<!-- Top Navigation Bar -->
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-[#dbdfe6] dark:border-slate-800 bg-white dark:bg-slate-900 px-6 md:px-10 lg:px-40 py-3 sticky top-0 z-50 backdrop-blur-md bg-white/90 dark:bg-slate-900/90">
    <div class="flex items-center gap-2 text-primary">
        <div class="size-8 flex items-center justify-center">
            <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1">medical_services</span>
        </div>
        <h2 class="text-[#111318] dark:text-white text-xl font-bold leading-tight tracking-tight">MediSlot</h2>
    </div>

    <div class="flex flex-1 justify-end gap-8 items-center">
        <nav class="hidden md:flex items-center gap-8">
            <a class="text-[#111318] dark:text-slate-300 text-sm font-medium hover:text-primary transition-colors {{ request()->is('/') ? 'text-primary font-semibold' : '' }}" href="{{ url('/') }}">Home</a>
            @auth
            @if(Auth::user()->role == 'admin')
            <a class="text-[#111318] dark:text-slate-300 text-sm font-medium hover:text-primary transition-colors {{ request()->is('appointments*') ? 'text-primary font-semibold border-b-2 border-primary pb-1' : '' }}" href="{{ route('admin_consultations') }}">Consultations</a>
            @else
            <a class="text-[#111318] dark:text-slate-300 text-sm font-medium hover:text-primary transition-colors {{ request()->is('Consultations*') ? 'text-primary font-semibold border-b-2 border-primary pb-1' : '' }}" href="{{ route('consultations') }}">Consultations</a>
            @endif
            @else
            <a class="text-[#111318] dark:text-slate-300 text-sm font-medium hover:text-primary transition-colors {{ request()->is('Consultations*') ? 'text-primary font-semibold border-b-2 border-primary pb-1' : '' }}" href="{{ route('consultations') }}">Consultations</a>
            @endauth


            @auth
            @if(Auth::user()->role == 'admin')
            <a class="text-[#111318] dark:text-slate-300 text-sm font-medium hover:text-primary transition-colors {{ request()->is('Appointments*') ? 'text-primary font-semibold' : '' }}" href="{{ route('admin_appointment') }}">Appointments</a>
            <a class="text-[#111318] dark:text-slate-300 text-sm font-medium hover:text-primary transition-colors {{ request()->is('records*') ? 'text-primary font-semibold' : '' }}" href="{{ route('users') }}">Users</a>
            @else
            <a class="text-[#111318] dark:text-slate-300 text-sm font-medium hover:text-primary transition-colors {{ request()->is('Appointments*') ? 'text-primary font-semibold' : '' }}" href="{{ route('appointments') }}">My Appointments</a>
            @endif
            @endauth
        </nav>

        <div class="h-8 w-px bg-slate-200 dark:bg-slate-700 hidden md:block"></div>

        <div class="flex items-center gap-4">
                <button class="hidden sm:flex min-w-[120px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold hover:bg-primary/90 transition-all shadow-sm shadow-primary/20">
                    <span class="truncate">Book Now</span>
                </button>
                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 border-2 border-slate-100 dark:border-slate-800 bg-primary/10 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary">account_circle</span>
                </div>
                @auth
                    <a href="{{ route('logout') }}" class="flex min-w-[100px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold hover:bg-primary/90 transition-all shadow-sm">
                        <span class="truncate">Log Out</span>
                    </a>
                @endauth
                @guest
                    <a href="{{ route('login_form') }}" class="text-sm font-medium text-[#111318] dark:text-slate-300 hover:text-primary transition-colors px-5 py-2 border border-primary rounded-lg hover:bg-primary/5">Log In</a>
                    <a href="{{ route('register_form') }}" class="flex min-w-[100px] cursor-pointer items-center justify-center rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold hover:bg-primary/90 transition-all shadow-sm">
                        <span class="truncate">Sign Up</span>
                    </a>
                @endguest
        </div>
    </div>
</header>

{{-- Page Content --}}
@yield('content')