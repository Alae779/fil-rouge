@section('title', 'Admin Consultation Management | MediSlot')

@include('partials.header')


<main class="flex-1 max-w-[1440px] mx-auto w-full px-6 py-8">
    <!-- Breadcrumbs -->
    <nav class="flex items-center gap-2 text-sm text-gray-500 mb-6">
        <a class="hover:text-primary transition-colors" href="{{ url('/admin/dashboard') }}">Home</a>
        <span class="material-symbols-outlined text-xs">chevron_right</span>
        <a class="hover:text-primary transition-colors" href="{{ url('/admin/dashboard') }}">Admin</a>
        <span class="material-symbols-outlined text-xs">chevron_right</span>
        <span class="text-gray-900 dark:text-gray-300 font-medium">Consultations</span>
    </nav>

    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight mb-2">Consultation Management</h1>
            <p class="text-gray-500 dark:text-gray-400">Manage, edit, and track all medical consultation slots across your facility.</p>
        </div>
        <a href="{{ route('create_consultation') }}" class="bg-primary hover:bg-primary/90 text-white font-bold py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all shadow-sm">
            <span class="material-symbols-outlined">add</span>
            Add New Consultation
        </a>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white dark:bg-gray-900 p-5 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Total Consultations</p>
            <p class="text-2xl font-black text-gray-900 dark:text-white">{{ $cons->count() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-900 p-5 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Average Price</p>
            <p class="text-2xl font-black text-gray-900 dark:text-white">{{number_format($averagePrice), 2}}</p>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden">
        <!-- Filters Bar -->
        <div class="p-4 border-b border-gray-100 dark:border-gray-800 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <button class="px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-2 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    <span class="material-symbols-outlined text-lg">filter_list</span>Filter
                </button>
                <button class="px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center gap-2 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    <span class="material-symbols-outlined text-lg">calendar_month</span>All Dates
                </button>
            </div>
            <div class="text-sm text-gray-500">
                Showing <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span class="font-semibold text-gray-900 dark:text-white">150</span> consultations
            </div>
        </div>

        <!-- Main Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 dark:bg-gray-800/50">
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider w-12">
                            <input class="rounded border-gray-300 text-primary focus:ring-primary" type="checkbox"/>
                        </th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider min-w-[200px]">Consultation Name</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider min-w-[280px]">Description</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Duration</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Time</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right sticky right-0 bg-gray-50 dark:bg-gray-800 z-10">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">

                    @foreach($consultations as $consultation)
                    <tr class="hover:bg-gray-50/80 dark:hover:bg-gray-800/80 transition-colors">
                        <td class="px-6 py-4"><input class="rounded border-gray-300 text-primary focus:ring-primary" type="checkbox"/></td>
                        <td class="px-6 py-4"><span class="font-semibold text-gray-900 dark:text-white">{{ $consultation->name }}</span></td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $consultation->description }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary/10 text-primary border border-primary/20">{{ $consultation->duree }}</span>
                        </td>
                        <td class="px-6 py-4 font-mono text-sm text-gray-900 dark:text-white">{{ $consultation->price }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">{{ $consultation->date }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">{{ $consultation->time }}</td>
                        <td class="px-6 py-4 text-right sticky right-0 bg-white dark:bg-gray-900">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('edit_consultation', $consultation->id) }}" class="p-1.5 text-gray-400 hover:text-primary transition-colors" title="Edit">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                </a>
                                <a href="{{ route('delete_consultation', $consultation->id) }}" class="p-1.5 text-gray-400 hover:text-red-500 transition-colors" title="Delete">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-6 border-t border-gray-100 dark:border-gray-800 flex items-center justify-center">
            {{ $consultations->links() }}
        </div>
    </div>
</main>
