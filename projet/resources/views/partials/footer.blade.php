{{-- Footer --}}
<footer class="border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 py-6 px-6 md:px-10 lg:px-40">
    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="flex items-center gap-2 text-primary">
            <span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' 1">medical_services</span>
            <span class="text-[#111318] dark:text-white font-bold">MediSlot</span>
        </div>
        <p class="text-slate-400 dark:text-slate-600 text-xs">
            &copy; {{ date('Y') }} MediSlot Medical Systems. All rights reserved.
        </p>
        <div class="flex justify-center gap-4 text-xs">
            <a class="text-slate-400 dark:text-slate-600 hover:text-primary transition-colors" href="#">Privacy Policy</a>
            <span class="text-slate-300 dark:text-slate-700">&bull;</span>
            <a class="text-slate-400 dark:text-slate-600 hover:text-primary transition-colors" href="#">Terms of Service</a>
            <span class="text-slate-300 dark:text-slate-700">&bull;</span>
            <a class="text-slate-400 dark:text-slate-600 hover:text-primary transition-colors" href="#">Support</a>
            <span class="text-slate-300 dark:text-slate-700">&bull;</span>
            <a class="text-slate-400 dark:text-slate-600 hover:text-primary transition-colors" href="#">Security</a>
            <span class="text-slate-300 dark:text-slate-700">&bull;</span>
            <a class="text-slate-400 dark:text-slate-600 hover:text-primary transition-colors" href="#">Accessibility</a>
        </div>
    </div>
</footer>

</div>{{-- end layout-container --}}
</div>{{-- end root wrapper --}}

@stack('scripts')
</body>
</html>