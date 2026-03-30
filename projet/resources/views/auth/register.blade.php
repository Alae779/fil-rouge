@section('title', 'Patient Signup - MediSlot')

@include('partials.header')

<!-- Main Content Area -->
<main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white dark:bg-gray-900 p-8 sm:p-10 rounded-xl shadow-xl border border-gray-100 dark:border-gray-800">
        <!-- Form Header -->
        <div class="text-center">
            <h1 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight mb-2">Join MediSlot</h1>
            <p class="text-gray-500 dark:text-gray-400 text-sm">Start booking your medical appointments in seconds.</p>
        </div>

        <!-- Signup Form -->
        <form class="mt-8 space-y-5" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Full Name Field -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1.5" for="full-name">Full Name</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors">
                        <span class="material-symbols-outlined text-lg">person</span>
                    </div>
                    <input class="block w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm"
                        id="full-name" name="name" placeholder="e.g. John Doe" required type="text" value="{{ old('name') }}"/>
                </div>
            </div>

            <!-- Email Address Field -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1.5" for="email">Email Address</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors">
                        <span class="material-symbols-outlined text-lg">mail</span>
                    </div>
                    <input autocomplete="email" class="block w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm"
                        id="email" name="email" placeholder="name@example.com" required type="email" value="{{ old('email') }}"/>
                </div>
            </div>

            <!-- Phone Number Field -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1.5" for="phone">Phone Number</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors">
                        <span class="material-symbols-outlined text-lg">call</span>
                    </div>
                    <input class="block w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm"
                        id="phone" name="phone" placeholder="+1 (555) 000-0000" required type="tel" value="{{ old('phone') }}"/>
                </div>
            </div>

            <!-- Password Field -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1.5" for="password">Password</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors">
                        <span class="material-symbols-outlined text-lg">lock</span>
                    </div>
                    <input class="block w-full pl-10 pr-12 py-3 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm"
                        id="password" name="password" placeholder="Min. 8 characters" required type="password"/>
                    <button class="password-toggle" type="button">
                        <span class="material-symbols-outlined text-lg">visibility</span>
                    </button>
                </div>
            </div>

            <!-- Terms and Privacy -->
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input class="h-4 w-4 text-primary focus:ring-primary border-gray-300 dark:border-gray-700 rounded transition-all" id="terms" name="terms" required type="checkbox"/>
                </div>
                <div class="ml-3 text-xs">
                    <label class="font-medium text-gray-500 dark:text-gray-400" for="terms">
                        I agree to the <a class="text-primary hover:underline" href="#">Terms of Service</a> and <a class="text-primary hover:underline" href="#">Privacy Policy</a>.
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button class="group relative w-full flex justify-center py-3.5 px-4 border border-transparent text-sm font-bold rounded-lg text-white bg-primary hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all shadow-lg shadow-primary/20" type="submit">
                    Create Account
                </button>
            </div>
        </form>

        <!-- Login Prompt -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Already have an account?
                <a class="font-bold text-primary hover:underline" href="{{ route('login') }}">Log in</a>
            </p>
        </div>
    </div>
</main>

@include('partials.footer')