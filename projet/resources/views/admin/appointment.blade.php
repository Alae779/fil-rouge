@section('title', 'Admin Appointments Management | MediSlot')

@include('partials.header')

<main class="flex-1 max-w-[1440px] mx-auto w-full px-6 py-8">
    <!-- Breadcrumbs -->
    <nav class="flex items-center gap-2 text-sm text-gray-500 mb-6">
        <a class="hover:text-primary transition-colors" href="{{ url('/admin/dashboard') }}">Home</a>
        <span class="material-symbols-outlined text-xs">chevron_right</span>
        <a class="hover:text-primary transition-colors" href="{{ url('/admin/dashboard') }}">Admin</a>
        <span class="material-symbols-outlined text-xs">chevron_right</span>
        <span class="text-gray-900 dark:text-gray-300 font-medium">Appointments</span>
    </nav>

    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight mb-2">Appointments Management</h1>
            <p class="text-gray-500 dark:text-gray-400">Review, accept, or decline patient appointment requests.</p>
        </div>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white dark:bg-gray-900 p-5 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Total Appointments</p>
            <p class="text-2xl font-black text-gray-900 dark:text-white">{{ $appointment->count() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-900 p-5 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Pending</p>
            <p class="text-2xl font-black text-amber-500">{{ $appointment->where('statut', 'pending')->count() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-900 p-5 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Accepted</p>
            <p class="text-2xl font-black text-green-500">{{ $appointment->where('statut', 'accepted')->count() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-900 p-5 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Cancelled</p>
            <p class="text-2xl font-black text-red-500">{{ $appointment->where('statut', 'cancelled')->count() }}</p>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden">
        <!-- Filters Bar -->
        <div class="p-4 border-b border-gray-100 dark:border-gray-800 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <!-- Filter by Status -->
                <form method="GET" action="{{ route('filter') }}" class="flex items-center gap-3">
                    <select name="statut" onchange="this.form.submit()" class="px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 focus:ring-primary focus:border-primary">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('statut') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="accepted" {{ request('statut') == 'accepted' ? 'selected' : '' }}>Accepted</option>
                        <option value="cancelled" {{ request('statut') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </form>
            </div>
            <div class="text-sm text-gray-500">
                Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $appointment->firstItem() ?? 0 }}-{{ $appointment->lastItem() ?? 0 }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $appointment->total() }}</span> appointments
            </div>
        </div>

        <!-- Main Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 dark:bg-gray-800/50">
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Patient Name</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Consultation Type</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Time</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right sticky right-0 bg-gray-50 dark:bg-gray-800 z-10">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    @forelse($appointment as $rdv)
                    @if($rdv->statut === 'pending')
                    <tr class="hover:bg-gray-50/80 dark:hover:bg-gray-800/80 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary">person</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $rdv->patient->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $rdv->patient->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-medium text-gray-900 dark:text-white">{{ $rdv->consultation->nom }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                            {{ \Carbon\Carbon::parse($rdv->date)->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                            {{ \Carbon\Carbon::parse($rdv->heure)->format('H:i') }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 border border-amber-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5"></span>
                                Pending
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right sticky right-0 bg-white dark:bg-gray-900">
                            <div class="flex items-center justify-end gap-2">
                                <!-- Accept Button -->
                                <form method="POST" action="{{ route('accept_appointment', $rdv->id) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="px-3 py-1.5 bg-green-500 hover:bg-green-600 text-white text-xs font-medium rounded-lg transition-colors flex items-center gap-1" title="Accept">
                                        <span class="material-symbols-outlined text-sm">check_circle</span>
                                        Accept
                                    </button>
                                </form>
                                
                                <!-- Cancel Button -->
                                <form method="POST" action="{{ route('cancel_appointment', $rdv->id) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-xs font-medium rounded-lg transition-colors flex items-center gap-1" title="Cancel">
                                        <span class="material-symbols-outlined text-sm">cancel</span>
                                        Decline
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endif
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <span class="material-symbols-outlined text-6xl text-gray-300 mb-3">event_busy</span>
                            <p class="text-gray-500 font-medium">No appointments found</p>
                        </div>
                    </td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-6 border-t border-gray-100 dark:border-gray-800">
            {{ $appointment->links() }}
        </div>
    </div>
</main>
