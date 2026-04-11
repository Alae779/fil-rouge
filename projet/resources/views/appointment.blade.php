@section('title', 'My Appointments | MediSlot')

@include('partials.header')

<main class="flex-1 max-w-[1440px] mx-auto w-full px-6 py-8">
    <!-- Breadcrumbs -->
    <nav class="flex items-center gap-2 text-sm text-gray-500 mb-6">
        <a class="hover:text-primary transition-colors" href="{{ url('/') }}">Home</a>
        <span class="material-symbols-outlined text-xs">chevron_right</span>
        <span class="text-gray-900 dark:text-gray-300 font-medium">My Appointments</span>
    </nav>

    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight mb-2">My Appointments</h1>
            <p class="text-gray-500 dark:text-gray-400">View and track all your medical appointments.</p>
        </div>
        <a href="{{ route('consultations') }}" class="bg-primary hover:bg-primary/90 text-white font-bold py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all shadow-sm">
            <span class="material-symbols-outlined">add</span>
            Book New Appointment
        </a>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white dark:bg-gray-900 p-5 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Total Appointments</p>
            <p class="text-2xl font-black text-gray-900 dark:text-white">{{ $appointments->total() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-900 p-5 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Pending</p>
            <p class="text-2xl font-black text-amber-500">{{ $appointments->where('statut', 'pending')->count() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-900 p-5 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Accepted</p>
            <p class="text-2xl font-black text-green-500">{{ $appointments->where('statut', 'accepted')->count() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-900 p-5 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Cancelled</p>
            <p class="text-2xl font-black text-red-500">{{ $appointments->where('statut', 'cancelled')->count() }}</p>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden">
        <!-- Filters Bar -->
        <div class="p-4 border-b border-gray-100 dark:border-gray-800 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <!-- Filter by Status -->
                <form method="GET" action="" class="flex items-center gap-3">
                    <select name="statut" onchange="this.form.submit()" class="px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 focus:ring-primary focus:border-primary">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('statut') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="accepted" {{ request('statut') == 'accepted' ? 'selected' : '' }}>Accepted</option>
                        <option value="cancelled" {{ request('statut') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </form>
            </div>
            <div class="text-sm text-gray-500">
                Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $appointments->firstItem() ?? 0 }}-{{ $appointments->lastItem() ?? 0 }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $appointments->total() }}</span> appointments
            </div>
        </div>

        <!-- Main Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 dark:bg-gray-800/50">
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Consultation Type</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Time</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Duration</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    @forelse($appointments as $rdv)
                    <tr class="hover:bg-gray-50/80 dark:hover:bg-gray-800/80 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary">medical_services</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $rdv->consultation->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $rdv->consultation->description }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                            {{ \Carbon\Carbon::parse($rdv->date)->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                            {{ \Carbon\Carbon::parse($rdv->heure)->format('H:i') }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary/10 text-primary border border-primary/20">
                                {{ $rdv->consultation->duree }} min
                            </span>
                        </td>
                        <td class="px-6 py-4 font-mono text-sm font-semibold text-gray-900 dark:text-white">
                            {{ $rdv->consultation->price }} DH
                        </td>
                        <td class="px-6 py-4">
                            @if($rdv->statut === 'pending')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 border border-amber-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5"></span>
                                    Pending
                                </span>
                            @elseif($rdv->statut === 'accepted')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span>
                                    Accepted
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5"></span>
                                    Cancelled
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            @if($rdv->statut === 'pending')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 border border-amber-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5"></span>
                                    Pending
                                </span>
                                <!-- Cancel Button -->
                                <form method="POST" action="{{ route('cancel_my_appointment', $rdv->id) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="px-2.5 py-1 bg-red-500 hover:bg-red-600 text-white text-xs font-medium rounded-lg transition-colors" title="Cancel" onclick="return confirm('Are you sure you want to cancel this appointment?')">
                                        Cancel
                                    </button>
                                </form>
                            @elseif($rdv->statut === 'accepted')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span>
                                    Accepted
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5"></span>
                                    Cancelled
                                </span>
                            @endif
                        </div>
                    </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <span class="material-symbols-outlined text-6xl text-gray-300 mb-3">event_busy</span>
                                <p class="text-gray-500 font-medium mb-2">No appointments found</p>
                                <p class="text-sm text-gray-400 mb-4">You haven't booked any appointments yet.</p>
                                <a href="{{ route('consultations') }}" class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-primary/90 transition-colors">
                                    Browse Consultations
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-6 border-t border-gray-100 dark:border-gray-800">
            {{ $appointments->links() }}
        </div>
    </div>
</main>

@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif

@if(session('error'))
<script>
    alert("{{ session('error') }}");
</script>
@endif