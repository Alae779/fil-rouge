@section('title', 'Booking Confirmed | MediSlot')

@include('partials.header')

<main class="flex-1 min-h-screen flex items-center justify-center px-6 py-12 bg-gradient-to-br from-primary/5 to-primary/10">
    <div class="max-w-md w-full">
        <!-- Success Card -->
        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-2xl overflow-hidden">
            <!-- Success Icon -->
            <div class="bg-gradient-to-br from-green-400 to-green-600 p-8 text-center">
                <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4 animate-bounce">
                    <span class="material-symbols-outlined text-5xl text-green-500">check_circle</span>
                </div>
                <h1 class="text-3xl font-black text-white mb-2">Booking Confirmed!</h1>
                <p class="text-green-50 text-sm">Your appointment has been successfully reserved</p>
            </div>

            <!-- Appointment Details -->
            <div class="p-8">
                <div class="space-y-4 mb-6">
                    <div class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-primary mt-1">medical_services</span>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider font-bold">Consultation</p>
                            <p class="text-gray-900 dark:text-white font-semibold">{{ $consultation->name }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-primary mt-1">calendar_today</span>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider font-bold">Date</p>
                            <p class="text-gray-900 dark:text-white font-semibold">{{ \Carbon\Carbon::parse($consultation->date)->format('l, F d, Y') }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-primary mt-1">schedule</span>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider font-bold">Time</p>
                            <p class="text-gray-900 dark:text-white font-semibold">{{ \Carbon\Carbon::parse($consultation->time)->format('h:i A') }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-primary mt-1">timer</span>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider font-bold">Duration</p>
                            <p class="text-gray-900 dark:text-white font-semibold">{{ $consultation->duree }} minutes</p>
                        </div>
                    </div>
                </div>

                <!-- Status Notice -->
                <div class="bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 rounded-lg p-4 mb-6">
                    <div class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-amber-600 dark:text-amber-500 mt-0.5">info</span>
                        <div>
                            <p class="font-semibold text-amber-900 dark:text-amber-300 text-sm mb-1">Pending Approval</p>
                            <p class="text-amber-700 dark:text-amber-400 text-xs">Your appointment is awaiting confirmation from our medical team. You'll receive a notification once it's approved.</p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col gap-3">
                    <a href="{{ route('appointments') }}" class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-3 px-6 rounded-lg flex items-center justify-center gap-2 transition-all shadow-lg shadow-primary/20">
                        <span class="material-symbols-outlined">event</span>
                        View My Appointments
                    </a>
                    <a href="{{ route('consultations') }}" class="w-full border-2 border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-300 font-semibold py-3 px-6 rounded-lg flex items-center justify-center gap-2 transition-all">
                        <span class="material-symbols-outlined">add</span>
                        Book Another Appointment
                    </a>
                </div>
            </div>
        </div>

        <!-- Additional Info -->
        <div class="text-center mt-6">
            <a href="{{ url('/') }}" class="text-sm text-gray-500 hover:text-primary transition-colors">
                ← Back to Home
            </a>
        </div>
    </div>
</main>

<style>
    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
    
    .animate-bounce {
        animation: bounce 1s ease-in-out 3;
    }
</style>