@section('title', 'Consultations Listing - MediSlot')

@include('partials.header')

<main class="px-6 lg:px-20 py-8 max-w-[1400px] mx-auto w-full">
    <!-- Title and Filter Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
        <div class="flex flex-col gap-1">
            <h1 class="text-slate-900 dark:text-white text-3xl font-black tracking-tight">Available Consultations</h1>
            <p class="text-slate-500 dark:text-slate-400 text-base">Book your next medical appointment with our certified specialists.</p>
        </div>
        <form method="GET" action="{{ route('specify') }}" class="flex items-center gap-3">
                    <!-- Search -->
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search patient..." class="px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 focus:ring-primary focus:border-primary"/>
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-primary/90 transition-colors">
                        Search
                    </button>
        </form>
    </div>

    <!-- Specialties Chips -->
    <!-- <div class="flex gap-3 mb-8 overflow-x-auto pb-2">
        <button class="flex h-9 shrink-0 items-center justify-center gap-x-2 rounded-full bg-primary px-4 text-white text-sm font-semibold">
            All Specialties
        </button>
        <button class="flex h-9 shrink-0 items-center justify-center gap-x-2 rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-4 text-slate-700 dark:text-slate-300 text-sm font-medium hover:border-primary transition-all">
            Cardiology
        </button>
        <button class="flex h-9 shrink-0 items-center justify-center gap-x-2 rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-4 text-slate-700 dark:text-slate-300 text-sm font-medium hover:border-primary transition-all">
            Dermatology
        </button>
        <button class="flex h-9 shrink-0 items-center justify-center gap-x-2 rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-4 text-slate-700 dark:text-slate-300 text-sm font-medium hover:border-primary transition-all">
            Pediatrics
        </button>
        <button class="flex h-9 shrink-0 items-center justify-center gap-x-2 rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-4 text-slate-700 dark:text-slate-300 text-sm font-medium hover:border-primary transition-all">
            Mental Health
        </button>
        <button class="flex h-9 shrink-0 items-center justify-center gap-x-2 rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-4 text-slate-700 dark:text-slate-300 text-sm font-medium hover:border-primary transition-all">
            Orthopedics
        </button>
    </div> -->

    <!-- Grid Layout of Consultations -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        <!-- Consultation Card 1 -->
         @foreach($consultations as $consultation)
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden flex flex-col hover:shadow-lg transition-shadow group">
            <div class="relative h-48 w-full">
                <div class="absolute inset-0 bg-center bg-cover transition-transform duration-500 group-hover:scale-105"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuADGdvjBI4TzfwO4mb6Dpfw9Rc4Bv_79t3vKhjRK2Lk_7pHkhCNqgg4t5u6E9Y29O7VYQv9qQmopE3YrEOgEG9hoyeqkF2HUu64w2OMT8l7OppxSQnAbkDOxPQlsd7eQRO5u8tPk2SErnuxu21OrJ304ZfSUHt0P3DycjULWU7UI23qBe4j3jndS9tZH6eZXhwrh57n3uV0bUzW_WiM47f2nDCw-g385pl7ZC_2JClmwYnZARDCVoYsyWUb2GOdL74nW8z90fWy");'>
                </div>
                <div class="absolute top-3 right-3 bg-white/90 dark:bg-slate-900/90 backdrop-blur px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider text-primary border border-primary/20">Available</div>
            </div>
            <div class="p-6 flex flex-col flex-1">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-slate-900 dark:text-white text-lg font-bold">{{$consultation->name}}</h3>
                    <span class="text-primary font-bold text-lg leading-none">${{$consultation->price}}</span>
                </div>
                <p class="text-slate-500 dark:text-slate-400 text-sm mb-4 line-clamp-2">{{$consultation->descriprtion}}</p>
                <div class="mt-auto space-y-3">
                    <div class="flex flex-wrap gap-y-2 gap-x-4">
                        <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-400 text-xs font-medium">
                            <span class="material-symbols-outlined text-sm text-primary">schedule</span>{{$consultation->duree}} mins
                        </div>
                        <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-400 text-xs font-medium">
                            <span class="material-symbols-outlined text-sm text-primary">calendar_today</span>{{$consultation->date}}
                        </div>
                        <div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-400 text-xs font-medium">
                            <span class="material-symbols-outlined text-sm text-primary">alarm</span>{{$consultation->time}}
                        </div>
                    </div>
                    @auth
                    <a href="{{ route('reserver', $consultation->id) }}" class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-3 px-4 rounded-lg transition-colors flex items-center justify-center gap-2">
                        Book Now <span class="material-symbols-outlined text-lg">arrow_forward</span>
                    </a>
                    @else
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
        <div class="p-6 border-t border-gray-100 dark:border-gray-800 flex items-center justify-center">
            {{ $consultations->links() }}
        </div>
</main>

@include('partials.footer')