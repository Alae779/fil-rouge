@section('title', 'Appointment Confirmation | MediSlot')

@include('partials.header')

<!-- Main Content Area -->
<main class="flex-1 flex flex-col items-center justify-center py-12 px-4">
    <div class="w-full max-w-[560px] bg-white dark:bg-gray-900 rounded-xl shadow-xl overflow-hidden border border-[#135bec]/5">
        <!-- Confirmation Header -->
        <div class="p-8 text-center border-b border-gray-100 dark:border-gray-800">
            <div class="inline-flex items-center justify-center size-16 rounded-full bg-primary/10 text-primary mb-4">
                <span class="material-symbols-outlined text-3xl">event_upcoming</span>
            </div>
            <h1 class="text-[#111318] dark:text-white text-3xl font-black leading-tight tracking-[-0.033em] mb-2">Review Appointment Details</h1>
            <p class="text-[#616f89] dark:text-gray-400 text-base font-normal">Please confirm your selection below to finalize your booking.</p>
        </div>

        <!-- Doctor Info Section -->
        <div class="p-8">   

            <!-- Details Grid -->
            <div class="space-y-4">
                <div class="detail-row">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary/70">stethoscope</span>
                        <p class="text-[#616f89] dark:text-gray-400 text-sm font-medium">Consultation Type</p>
                    </div>
                    <p class="text-[#111318] dark:text-white text-sm font-semibold">{{$consultation->name}}</p>
                </div>
                <div class="detail-row">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary/70">calendar_today</span>
                        <p class="text-[#616f89] dark:text-gray-400 text-sm font-medium">Date</p>
                    </div>
                    <p class="text-[#111318] dark:text-white text-sm font-semibold">{{$consultation->date}}</p>
                </div>
                <div class="detail-row">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary/70">schedule</span>
                        <p class="text-[#616f89] dark:text-gray-400 text-sm font-medium">Time Slot</p>
                    </div>
                    <p class="text-[#111318] dark:text-white text-sm font-semibold">{{$consultation->time}}</p>
                </div>
                <div class="detail-row">
                    <div class="flex items-center gap-3">
                        <p class="text-[#616f89] dark:text-gray-400 text-sm font-medium">Durée</p>
                    </div>
                    <p class="text-[#111318] dark:text-white text-sm font-semibold">{{$consultation->duree}}</p>
                </div>
                <div class="flex items-center justify-between py-5 mt-2 bg-primary/5 rounded-lg px-4">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary">payments</span>
                        <p class="text-[#111318] dark:text-white font-bold">Total Consultation Fee</p>
                    </div>
                    <p class="text-primary text-2xl font-black">${{$consultation->price}}</p>
                </div>
            </div>

            <!-- Actions -->
            <div class="mt-10 space-y-4">
                <form method="POST" action="{{ route('confirm', $consultation) }}">
                    @csrf
                    <button class="w-full flex cursor-pointer items-center justify-center overflow-hidden rounded-lg h-14 px-5 bg-primary hover:bg-primary/90 text-white text-lg font-bold transition-all shadow-lg shadow-primary/20" type="submit">
                        <span>Confirm Booking</span>
                    </button>
                </form>
                <a href="{{ url()->previous() }}" class="w-full flex cursor-pointer items-center justify-center rounded-lg h-12 px-5 bg-transparent border border-gray-200 dark:border-gray-700 text-[#616f89] dark:text-gray-400 text-sm font-medium hover:bg-gray-50 dark:hover:bg-gray-800 transition-all">
                    <span>Go Back</span>
                </a>
            </div>

            <!-- Disclaimer -->
            <div class="mt-8 pt-6 border-t border-gray-100 dark:border-gray-800">
                <div class="info-block">
                    <span class="material-symbols-outlined text-sm mt-0.5">info</span>
                    <p>By confirming, you agree to our cancellation policy. Appointments cancelled less than 24 hours in advance may be subject to a processing fee. Your data is protected by MediSlot's encrypted health privacy standards.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Support Link -->
    <p class="mt-8 text-sm text-[#616f89] dark:text-gray-500">
        Need help? <a class="text-primary font-semibold hover:underline" href="#">Contact Medical Center Support</a>
    </p>
</main>

@include('partials.footer')