@section('title', 'Add New Consultation | MediSlot')

@include('partials.header')


<main class="flex-1 max-w-[1440px] mx-auto w-full px-6 py-8">

    {{-- Breadcrumbs --}}
    <nav class="flex items-center gap-2 text-sm text-gray-500 mb-6">
        <a class="hover:text-primary transition-colors" href="{{ url('/admin/dashboard') }}">Home</a>
        <span class="material-symbols-outlined text-xs">chevron_right</span>
        <a class="hover:text-primary transition-colors" href="{{ url('/admin/consultations') }}">Consultations</a>
        <span class="material-symbols-outlined text-xs">chevron_right</span>
        <span class="text-gray-900 dark:text-gray-300 font-medium">Add New</span>
    </nav>

    {{-- Page Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-black text-gray-900 dark:text-white tracking-tight mb-1">Add New Consultation</h1>
            <p class="text-gray-500 dark:text-gray-400">Fill in the details below to create a new consultation slot.</p>
        </div>
        <a href="{{ url('/admin/consultations') }}"
            class="flex items-center gap-2 px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-lg text-sm font-medium text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
            <span class="material-symbols-outlined text-lg">arrow_back</span>
            Back to Consultations
        </a>
    </div>

    {{-- Form Card --}}
    <div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden">

        {{-- Form Header --}}
        <div class="px-8 py-5 border-b border-gray-100 dark:border-gray-800 flex items-center gap-3">
            <div class="size-9 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
                <span class="material-symbols-outlined">stethoscope</span>
            </div>
            <h2 class="text-lg font-bold text-gray-900 dark:text-white">Consultation Details</h2>
        </div>

        <form method="POST" action="{{ route('store_consultation') }}" class="p-8">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Name --}}
                <div class="md:col-span-2">
                    <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1.5">
                        Consultation Name <span class="text-red-500">*</span>
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors">
                            <span class="material-symbols-outlined text-lg">title</span>
                        </div>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                            placeholder="e.g. General Checkup"
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm @error('name') border-red-400 @enderror"/>
                    </div>
                    @error('name')
                        <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">error</span>{{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1.5">
                        Description <span class="text-red-500">*</span>
                    </label>
                    <div class="relative group">
                        <div class="absolute top-3 left-0 pl-3.5 flex items-start pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors">
                            <span class="material-symbols-outlined text-lg">description</span>
                        </div>
                        <textarea id="description" name="description" required rows="3"
                            placeholder="Briefly describe what this consultation covers..."
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm resize-none @error('description') border-red-400 @enderror">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                        <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">error</span>{{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Duration --}}
                <div>
                    <label for="duree" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1.5">
                        Duration (minutes) <span class="text-red-500">*</span>
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors">
                            <span class="material-symbols-outlined text-lg">schedule</span>
                        </div>
                        <input type="number" id="duree" name="duree" value="{{ old('duree') }}" required
                            min="5" max="480" placeholder="e.g. 30"
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm @error('duree') border-red-400 @enderror"/>
                    </div>
                    @error('duree')
                        <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">error</span>{{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Price --}}
                <div>
                    <label for="price" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1.5">
                        Price (DH) <span class="text-red-500">*</span>
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors">
                            <span class="material-symbols-outlined text-lg">payments</span>
                        </div>
                        <input type="number" id="price" name="price" value="{{ old('price') }}" required
                            min="0" step="0.01" placeholder="e.g. 75.00"
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm @error('price') border-red-400 @enderror"/>
                    </div>
                    @error('price')
                        <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">error</span>{{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Date --}}
                <div>
                    <label for="date" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1.5">
                        Date <span class="text-red-500">*</span>
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors">
                            <span class="material-symbols-outlined text-lg">calendar_today</span>
                        </div>
                        <input type="date" id="date" name="date" value="{{ old('date') }}" required
                            min="{{ date('Y-m-d') }}"
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm @error('date') border-red-400 @enderror"/>
                    </div>
                    @error('date')
                        <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">error</span>{{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Time --}}
                <div>
                    <label for="time" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1.5">
                        Time <span class="text-red-500">*</span>
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary transition-colors">
                            <span class="material-symbols-outlined text-lg">alarm</span>
                        </div>
                        <input type="time" id="time" name="time" value="{{ old('time') }}" required
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm @error('time') border-red-400 @enderror"/>
                    </div>
                    @error('time')
                        <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">error</span>{{ $message }}
                        </p>
                    @enderror
                </div>

            </div>

            {{-- Divider --}}
            <div class="border-t border-gray-100 dark:border-gray-800 my-8"></div>

            {{-- Actions --}}
            <div class="flex flex-col sm:flex-row items-center justify-end gap-3">
                <a href="{{ url('/admin/consultations') }}"
                    class="w-full sm:w-auto flex items-center justify-center gap-2 px-6 py-3 border border-gray-200 dark:border-gray-700 rounded-lg text-sm font-semibold text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    Cancel
                </a>
                <button type="submit"
                    class="w-full sm:w-auto flex items-center justify-center gap-2 px-8 py-3 bg-primary hover:bg-primary/90 text-white text-sm font-bold rounded-lg transition-all shadow-sm shadow-primary/20">
                    <span class="material-symbols-outlined text-lg">add_circle</span>
                    Create Consultation
                </button>
            </div>

        </form>
    </div>

</main>
