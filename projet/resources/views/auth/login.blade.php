@section('title', 'Login | MediSlot')

@include('partials.header')

<!-- Main Content Area -->
<main class="flex-1 flex items-center justify-center p-6">
    <div class="w-full max-w-[480px] bg-white dark:bg-slate-900 rounded-xl shadow-xl border border-[#dbdfe6] dark:border-slate-800 overflow-hidden">
        <!-- Hero Header Image -->
        <div class="relative h-32 w-full bg-primary/10 flex items-center justify-center overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-primary/20 to-transparent"></div>
            <div class="relative z-10 flex flex-col items-center">
                <span class="material-symbols-outlined text-primary text-5xl mb-1">account_circle</span>
            </div>
            <div class="absolute bottom-0 left-0 w-full h-12 bg-gradient-to-t from-white dark:from-slate-900 to-transparent"></div>
        </div>

        <!-- Login Form Container -->
        <div class="px-8 pt-2 pb-10">
            <div class="text-center mb-8">
                <h1 class="text-[#111318] dark:text-white text-2xl font-bold leading-tight mb-2">Welcome Back</h1>
                <p class="text-slate-500 dark:text-slate-400 text-sm">Enter your credentials to access your dashboard.</p>
            </div>

            <!-- Role Selector Tabs -->
            <div class="flex p-1 bg-background-light dark:bg-slate-800 rounded-lg mb-6">
                <button class="flex-1 py-2 text-sm font-semibold rounded-md bg-white dark:bg-slate-700 text-primary shadow-sm">Patient</button>
                <button class="flex-1 py-2 text-sm font-semibold rounded-md text-slate-500 dark:text-slate-400 hover:text-primary transition-colors">Administrator</button>
            </div>

            <form class="space-y-5" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Field -->
                <div class="flex flex-col gap-2">
                    <label class="text-[#111318] dark:text-slate-200 text-sm font-semibold flex items-center gap-2">
                        <span class="material-symbols-outlined text-lg opacity-70">mail</span>
                        Email Address
                    </label>
                    <input class="form-input w-full rounded-lg text-[#111318] dark:text-white border border-[#dbdfe6] dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-primary focus:ring-2 focus:ring-primary/20 h-12 px-4 text-base transition-all placeholder:text-slate-400"
                        placeholder="e.g. name@hospital.com" type="email" name="email" value="{{ old('email') }}" required autofocus/>
                </div>

                <!-- Password Field -->
                <div class="flex flex-col gap-2">
                    <div class="flex justify-between items-center">
                        <label class="text-[#111318] dark:text-slate-200 text-sm font-semibold flex items-center gap-2">
                            <span class="material-symbols-outlined text-lg opacity-70">lock</span>
                            Password
                        </label>
                    </div>
                    <div class="relative">
                        <input class="form-input w-full rounded-lg text-[#111318] dark:text-white border border-[#dbdfe6] dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-primary focus:ring-2 focus:ring-primary/20 h-12 px-4 text-base transition-all placeholder:text-slate-400 pr-10"
                            placeholder="••••••••" type="password" name="password" required/>
                        <button class="password-toggle" type="button">
                            <span class="material-symbols-outlined text-xl">visibility</span>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center gap-2 pt-1">
                    <input class="rounded border-slate-300 text-primary focus:ring-primary h-4 w-4" id="remember" name="remember" type="checkbox"/>
                    <label class="text-sm text-slate-600 dark:text-slate-400" for="remember">Keep me logged in for 30 days</label>
                </div>

                <!-- Login Button -->
                <button class="w-full bg-primary text-white font-bold py-3.5 rounded-lg shadow-md hover:bg-primary/90 active:scale-[0.98] transition-all flex items-center justify-center gap-2 mt-4" type="submit">
                    <span>Login to Dashboard</span>
                    <span class="material-symbols-outlined text-lg">arrow_forward</span>
                </button>
            </form>

            <!-- Footer Links -->
            <div class="mt-8 pt-6 border-t border-[#f0f2f4] dark:border-slate-800 text-center">
                <p class="text-slate-500 dark:text-slate-400 text-sm">
                    Don't have an account yet?
                    <a class="text-primary font-bold hover:underline ml-1" href="{{ route('register') }}">Create Account</a>
                </p>
            </div>
        </div>
    </div>
</main>

@include('partials.footer')