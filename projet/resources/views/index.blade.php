@section('title', 'MediSlot - Medical Appointment Booking Platform')

@include('partials.header')

<main class="flex-1">
    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-white">
        <div class="absolute inset-0 bg-grid-pattern opacity-50"></div>
        <div class="hero-blob-1"></div>
        <div class="hero-blob-2"></div>
        <div class="px-6 lg:px-40 py-20 lg:py-32 relative z-10">
            <div class="max-w-[1200px] mx-auto grid lg:grid-cols-2 gap-12 items-center">
                <div class="flex flex-col gap-8">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider w-fit">
                        <span class="material-symbols-outlined text-sm">verified</span>
                        Next-Gen Healthcare Scheduling
                    </div>
                    <h1 class="text-[#111318] text-5xl lg:text-7xl font-black leading-[1.1] tracking-[-0.04em]">
                        Book Your Next Medical Appointment <span class="text-primary">Effortlessly</span>
                    </h1>
                    <p class="text-[#4a5568] text-lg lg:text-xl font-normal leading-relaxed max-w-[580px]">
                        The all-in-one platform for patients to schedule visits and administrators to manage clinics with clinical precision.
                    </p>
                    <div class="flex flex-wrap gap-4 mt-4">
                        <button class="flex min-w-[160px] cursor-pointer items-center justify-center rounded-xl h-14 px-8 bg-primary text-white text-base font-bold shadow-lg shadow-primary/25 hover:shadow-xl hover:shadow-primary/40 transition-all transform hover:-translate-y-0.5">
                            Book Now
                        </button>
                        <button class="flex min-w-[160px] cursor-pointer items-center justify-center rounded-xl h-14 px-8 border-2 border-[#dbdfe6] bg-transparent text-[#111318] text-base font-bold hover:bg-[#f0f2f4] transition-all">
                            Learn More
                        </button>
                    </div>
                    <div class="flex items-center gap-6 mt-6 border-t border-[#f0f2f4] pt-8">
                        <div class="flex -space-x-3">
                            <div class="w-10 h-10 rounded-full border-2 border-white bg-primary/20 flex items-center justify-center overflow-hidden">
                                <span class="material-symbols-outlined text-primary text-sm">person</span>
                            </div>
                            <div class="w-10 h-10 rounded-full border-2 border-white bg-primary/30 flex items-center justify-center overflow-hidden">
                                <span class="material-symbols-outlined text-primary text-sm">person</span>
                            </div>
                            <div class="w-10 h-10 rounded-full border-2 border-white bg-primary/40 flex items-center justify-center overflow-hidden">
                                <span class="material-symbols-outlined text-primary text-sm">person</span>
                            </div>
                        </div>
                        <p class="text-sm text-[#4a5568]"><span class="font-bold text-[#111318]">10,000+</span> patients trust MediSlot</p>
                    </div>
                </div>
                <div class="hidden lg:flex items-center justify-center">
                    <div class="w-full max-w-md h-96 bg-primary/5 rounded-2xl border border-primary/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-9xl opacity-30" style="font-variation-settings: 'FILL' 1">medical_services</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="px-6 lg:px-40 py-20 bg-[#f6f6f8]">
        <div class="max-w-[1200px] mx-auto">
            <div class="text-center mb-14">
                <h2 class="text-3xl lg:text-4xl font-black text-[#111318] tracking-tight mb-4">Everything You Need</h2>
                <p class="text-[#4a5568] text-lg max-w-xl mx-auto">Streamlined features for both patients and healthcare providers.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl border border-[#dbdfe6] hover:shadow-lg transition-shadow">
                    <div class="size-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-5">
                        <span class="material-symbols-outlined text-2xl">calendar_month</span>
                    </div>
                    <h3 class="text-lg font-bold text-[#111318] mb-2">Easy Scheduling</h3>
                    <p class="text-[#4a5568] text-sm leading-relaxed">Book appointments in seconds with our intuitive calendar system.</p>
                </div>
                <div class="bg-white p-8 rounded-xl border border-[#dbdfe6] hover:shadow-lg transition-shadow">
                    <div class="size-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-5">
                        <span class="material-symbols-outlined text-2xl">notifications_active</span>
                    </div>
                    <h3 class="text-lg font-bold text-[#111318] mb-2">Smart Reminders</h3>
                    <p class="text-[#4a5568] text-sm leading-relaxed">Never miss an appointment with automated email and SMS notifications.</p>
                </div>
                <div class="bg-white p-8 rounded-xl border border-[#dbdfe6] hover:shadow-lg transition-shadow">
                    <div class="size-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary mb-5">
                        <span class="material-symbols-outlined text-2xl">security</span>
                    </div>
                    <h3 class="text-lg font-bold text-[#111318] mb-2">Secure & Private</h3>
                    <p class="text-[#4a5568] text-sm leading-relaxed">Your health data is encrypted and protected with enterprise-grade security.</p>
                </div>
            </div>
        </div>
    </div>
</main>

@include('partials.footer')