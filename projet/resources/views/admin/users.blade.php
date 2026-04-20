@section('title', 'Users Management | MediSlot')

@include('partials.header')

<main class="flex-1 max-w-[1440px] mx-auto w-full px-6 py-8">
    <!-- Breadcrumbs -->
    <nav class="flex items-center gap-2 text-sm text-gray-500 mb-6">
        <a class="hover:text-primary transition-colors" href="{{ url('/admin/dashboard') }}">Home</a>
        <span class="material-symbols-outlined text-xs">chevron_right</span>
        <a class="hover:text-primary transition-colors" href="{{ url('/admin/dashboard') }}">Admin</a>
        <span class="material-symbols-outlined text-xs">chevron_right</span>
        <span class="text-gray-900 dark:text-gray-300 font-medium">Users</span>
    </nav>

    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight mb-2">Users Management</h1>
            <p class="text-gray-500 dark:text-gray-400">Manage platform users, ban or unban accounts.</p>
        </div>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white dark:bg-gray-900 p-5 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Total Users</p>
            <p class="text-2xl font-black text-gray-900 dark:text-white">{{ $users->total() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-900 p-5 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Active</p>
            <p class="text-2xl font-black text-green-500">{{ $users->where('is_banned', "active")->count() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-900 p-5 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Banned</p>
            <p class="text-2xl font-black text-red-500">{{ $users->where('is_banned', "banned")->count() }}</p>
        </div>
        <div class="bg-white dark:bg-gray-900 p-5 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Admins</p>
            <p class="text-2xl font-black text-primary">{{ $users->where('role', 'admin')->count() }}</p>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden">
        <!-- Filters Bar -->
        <div class="p-4 border-b border-gray-100 dark:border-gray-800 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <form method="GET" action="{{ route('users_search') }}" class="flex items-center gap-3">
                    <!-- Search -->
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search user..." class="px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 focus:ring-primary focus:border-primary"/>
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-primary/90 transition-colors">
                        Search
                    </button>
                </form>
            </div>
            <div class="text-sm text-gray-500">
                Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $users->firstItem() ?? 0 }}-{{ $users->lastItem() ?? 0 }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $users->total() }}</span> users
            </div>
        </div>

        <!-- Main Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 dark:bg-gray-800/50">
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">User</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Phone</th>
                        <thn class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Joined</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right sticky right-0 bg-gray-50 dark:bg-gray-800 z-10">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    @forelse($users as $user)
                    <tr class="hover:bg-gray-50/80 dark:hover:bg-gray-800/80 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary">
                                        {{ $user->role === 'admin' ? 'admin_panel_settings' : 'person' }}
                                    </span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $user->name ?? $user->nom . ' ' . $user->prenom }}</p>
                                    <p class="text-xs text-gray-500">ID: {{ $user->id }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                            {{ $user->phone ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4">
                            @if($user->role === 'admin')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                    <span class="material-symbols-outlined text-xs mr-1">shield</span>
                                    Admin
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                    <span class="material-symbols-outlined text-xs mr-1">person</span>
                                    Patient
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($user->is_banned === 'banned')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5"></span>
                                    Banned
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span>
                                    Active
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                            {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-right sticky right-0 bg-white dark:bg-gray-900">
                            <div class="flex items-center justify-end gap-2">
                                @if($user->role !== 'admin')
                                    @if($user->is_banned === 'banned')
                                        <!-- Unban Button -->
                                        <form method="POST" action="{{ route('unban_user', $user->id) }}" class="inline">
                                            @csrf
                                            <button type="submit" class="px-3 py-1.5 bg-green-500 hover:bg-green-600 text-white text-xs font-medium rounded-lg transition-colors flex items-center gap-1" title="Unban User">
                                                <span class="material-symbols-outlined text-sm">check_circle</span>
                                                Unban
                                            </button>
                                        </form>
                                    @else
                                        <!-- Ban Button -->
                                        <form method="POST" action="{{ route('ban_user', $user->id) }}" class="inline">
                                            @csrf
                                            <button type="submit" class="px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-xs font-medium rounded-lg transition-colors flex items-center gap-1" title="Ban User" onclick="return confirm('Are you sure you want to ban this user?')">
                                                <span class="material-symbols-outlined text-sm">block</span>
                                                Ban
                                            </button>
                                        </form>
                                    @endif
                                @else
                                    <span class="text-xs text-gray-400 italic">Admin account</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <span class="material-symbols-outlined text-6xl text-gray-300 mb-3">person_off</span>
                                <p class="text-gray-500 font-medium">No users found</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-6 border-t border-gray-100 dark:border-gray-800">
            {{ $users->links() }}
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