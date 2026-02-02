<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hospital Virgen Del Valle @hasSection('title') - @yield('title') @endif</title>
    <link rel="icon" href="{{ asset('images/svg/virgen-compact.svg') }}">

    <!-- Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" /> -->

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/custom-views.css') }}" type="text/css"> -->

    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"> -->

    <!-- Styles Inicio -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" type="text/css">

    <!-- Styles Bienes Nacionales -->
    <link rel="stylesheet" href="{{ asset('css/newCSS/tuestilo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/newCSS/theme.css') }}" type="text/css">

    <!-- Scripts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

    @stack('styles')
    
    <style>
        .swal2-container {
            z-index: 99999 !important;
        }
    </style>
    
    <!-- Dark Mode Script -->
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        function toggleTheme() {
            const html = document.documentElement;
            const isDark = html.classList.contains('dark');
            
            const newTheme = isDark ? 'light' : 'dark';
            
            if (isDark) {
                html.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                html.classList.add('dark');
                localStorage.theme = 'dark';
            }
            updateThemeIcon();
            
            // Save theme preference to database
            fetch('/user-preferences/theme', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ theme: newTheme })
            })
            .then(response => response.json())
            .then(data => {
                if (!data.success) {
                    console.error('Failed to save theme preference');
                }
            })
            .catch(error => console.error('Error saving theme:', error));
        }

        function updateThemeIcon() {
            const btn = document.getElementById('theme-toggle');
            if (!btn) return;
            
            const isDark = document.documentElement.classList.contains('dark');
            // Moon icon for light mode (to switch to dark), Sun icon for dark mode (to switch to light)
            // Or represent current state. Let's make it intuitive:
            // If Dark -> Show Sun (to switch to light)
            // If Light -> Show Moon (to switch to dark)
            
            if (isDark) {
                btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sun"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>';
                btn.classList.add('text-yellow-500');
                btn.classList.remove('text-gray-500');
            } else {
                btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-moon"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>';
                btn.classList.remove('text-yellow-500');
                btn.classList.add('text-gray-500');
            }
        }

        document.addEventListener('DOMContentLoaded', updateThemeIcon);
    </script>

    <!-- Critical Dark Mode Overrides (Force Styles without Rebuild) -->
    <style>
        /* Force dark background and text on global containers */
        html.dark body, html.dark #root {
            background-color: #0f172a !important; /* slate-900 */
            color: #f8fafc !important; /* slate-50 */
        }

        /* Sidebar Override */
        html.dark aside {
            background-image: none !important;
            background-color: #020617 !important; /* slate-950 */
            border-right: 1px solid #1e293b !important; /* slate-800 */
        }
        html.dark aside .border-b, 
        html.dark aside .border-t {
            border-color: #1e293b !important;
        }
        html.dark aside .bg-blue-800 {
            background-color: #1e293b !important; /* slate-800 */
        }
        html.dark aside .text-blue-100,
        html.dark aside .text-blue-200 {
            color: #94a3b8 !important; /* slate-400 */
        }
        html.dark aside a.bg-white { /* Active Link */
            background-color: #2563eb !important; /* blue-600 */
            color: #ffffff !important;
            box-shadow: none !important;
        }
        html.dark aside a:not(.bg-white):hover { /* Inactive Link Hover */
            background-color: #1e293b !important;
            color: #ffffff !important;
        }

        /* Header Override */
        html.dark header {
            background-color: #1e293b !important; /* slate-800 */
            border-bottom: 1px solid #334155 !important; /* slate-700 */
        }
        html.dark header h2,
        html.dark header h2.text-gray-900 {
            color: #f1f5f9 !important; /* slate-100 */
        }
        html.dark header p.text-gray-500 {
            color: #94a3b8 !important; /* slate-400 */
        }

        /* Footer Override */
        html.dark footer {
            background-color: #0f172a !important; /* slate-900 */
            border-top: 1px solid #1e293b !important; /* slate-800 */
        }
        html.dark footer .text-slate-900 {
            color: #f1f5f9 !important;
        }
        html.dark footer .bg-white {
            background-color: #1e293b !important;
            border-color: #334155 !important;
        }
        html.dark footer .text-slate-500,
        html.dark footer .text-slate-600 {
            color: #94a3b8 !important;
        }

        /* Content Card Overrides */
        html.dark .bg-white,
        html.dark .bg-card {
            background-color: #1e293b !important; /* slate-800 */
            color: #f8fafc !important;
            border-color: #334155 !important;
        }
        
        /* Inputs and Selects */
        html.dark input, 
        html.dark select, 
        html.dark textarea {
            background-color: #334155 !important; /* slate-700 */
            border-color: #475569 !important; /* slate-600 */
            color: #fff !important;
        }
        html.dark input::placeholder {
            color: #94a3b8 !important;
        }

        /* Text Overrides */
        html.dark .text-gray-900, 
        html.dark .text-slate-900 {
            color: #f1f5f9 !important;
        }
        html.dark .text-gray-600, 
        html.dark .text-gray-500 {
            color: #cbd5e1 !important;
        }
        
        /* Table Headers */
        html.dark thead tr th {
            background-color: #0f172a !important; /* slate-900 */
            color: #cbd5e1 !important;
        }
        html.dark tbody tr {
            border-bottom-color: #334155 !important;
        }
        html.dark tbody tr:hover {
            background-color: #334155 !important;
        }

        /* Main Content Override to Fix User Issue */
        html.dark main {
            background-color: #0f172a !important; /* slate-900 matching body */
        }

        /* Modal Footer Overrides for Dark Mode */
        html.dark [role="dialog"] .border-t,
        html.dark [role="dialog"] footer,
        html.dark [role="dialog"] div[class*="border-t"] {
            border-color: #334155 !important; /* slate-700 */
            background-color: #1e293b !important; /* slate-800 */
        }

        /* Modal Footer Buttons */
        html.dark [role="dialog"] button[class*="border-gray"] {
            border-color: #475569 !important;
        }

        html.dark [role="dialog"] button[class*="bg-white"]:not([class*="bg-blue"]):not([class*="bg-red"]) {
            background-color: #334155 !important;
            color: #f1f5f9 !important;
        }

        html.dark [role="dialog"] button[class*="bg-white"]:hover:not([class*="bg-blue"]):not([class*="bg-red"]) {
            background-color: #475569 !important;
        }

        /* Custom Scrollbar for Dark Mode */
        html.dark ::-webkit-scrollbar {
            width: 12px;
            height: 12px;
        }

        html.dark ::-webkit-scrollbar-track {
            background: #1e293b; /* slate-800 */
            border-radius: 6px;
        }

        html.dark ::-webkit-scrollbar-thumb {
            background: #475569; /* slate-600 */
            border-radius: 6px;
            border: 2px solid #1e293b;
        }

        html.dark ::-webkit-scrollbar-thumb:hover {
            background: #64748b; /* slate-500 */
        }

        /* Firefox Scrollbar */
        html.dark * {
            scrollbar-width: thin;
            scrollbar-color: #475569 #1e293b;
        }

        /* Modal Internal Content Divs */
        html.dark [role="dialog"] dl,
        html.dark [role="dialog"] .bg-gray-50,
        html.dark [role="dialog"] div[class*="bg-gray-50"] {
            background-color: #1e293b !important; /* slate-800 */
        }

        html.dark [role="dialog"] dt {
            color: #cbd5e1 !important; /* slate-300 */
        }

        html.dark [role="dialog"] dd {
            color: #f1f5f9 !important; /* slate-100 */
        }

        html.dark [role="dialog"] .bg-blue-50 {
            background-color: #1e3a8a !important; /* blue-900 */
        }

        html.dark [role="dialog"] .bg-emerald-50 {
            background-color: #064e3b !important; /* emerald-900 */
        }

        html.dark [role="dialog"] .bg-amber-50 {
            background-color: #78350f !important; /* amber-900 */
        }

        html.dark [role="dialog"] .bg-red-50 {
            background-color: #7f1d1d !important; /* red-900 */
        }

        /* Modal Content Borders */
        html.dark [role="dialog"] .border,
        html.dark [role="dialog"] div[class*="border-"] {
            border-color: #334155 !important;
        }

        /* Global Card and Section Backgrounds */
        html.dark .bg-card,
        html.dark div[class*="bg-card"],
        html.dark div[data-slot="card"].bg-white {
            background-color: #1e293b !important; /* slate-800 */
            color: #f8fafc !important;
        }

        /* html.dark .bg-gray-50:not([role="dialog"] .bg-gray-50) {
            background-color: #334155 !important;
        } */

        /* Card Borders */
        html.dark div[data-slot="card"] {
            border-color: #334155 !important;
        }

        /* Card Titles and Descriptions */
        html.dark [data-slot="card-title"],
        html.dark h4[data-slot="card-title"] {
            color: #f1f5f9 !important;
        }

        html.dark [data-slot="card-description"],
        html.dark p[data-slot="card-description"] {
            color: #cbd5e1 !important;
        }

        /* Select/Combobox Buttons */
        html.dark button[data-slot="select-trigger"].bg-white,
        html.dark button[role="combobox"].bg-white {
            background-color: #334155 !important;
            border-color: #475569 !important;
            color: #f1f5f9 !important;
        }

        /* Tab Buttons Active State */
        html.dark button[role="tab"][data-state="active"].bg-white,
        html.dark button[role="tab"][aria-selected="true"].bg-white {
            background-color: #334155 !important; /* slate-700 */
            color: #60a5fa !important; /* blue-400 */
        }

        /* Table Rows Hover */
        html.dark tr.hover\:bg-gray-50:hover,
        html.dark tr[class*="hover:bg-gray-50"]:hover {
            background-color: #334155 !important;
        }

        /* Table Text Colors */
        html.dark td.text-gray-900,
        html.dark td.font-medium.text-gray-900 {
            color: #f1f5f9 !important;
        }

        html.dark td.text-gray-600 {
            color: #cbd5e1 !important;
        }

        html.dark td.text-gray-400 {
            color: #94a3b8 !important;
        }

        /* Table Toolbar */
        html.dark .bg-white.border-b {
            background-color: #1e293b !important;
        }

        /* Table Dividers */
        html.dark tbody.divide-y {
            border-color: #334155 !important;
        }

        html.dark tbody.divide-y > tr {
            border-bottom-color: #334155 !important;
        }

        /* More Specific Tab Button Overrides */
        html.dark button.tab-trigger[data-state="active"],
        html.dark button.tab-trigger[aria-selected="true"] {
            background-color: #334155 !important;
            color: #60a5fa !important;
        }

        html.dark button.tab-trigger[data-state="inactive"],
        html.dark button.tab-trigger[aria-selected="false"] {
            background-color: transparent !important;
        }

        /* Table Background Override */
        html.dark table tbody tr {
            background-color: transparent !important;
        }

        html.dark table tbody tr:hover {
            background-color: #334155 !important;
        }

        /* Specific Table Cell Text */
        html.dark table td {
            color: #cbd5e1 !important;
        }

        html.dark table td.font-medium {
            color: #f1f5f9 !important;
        }

        /* Ultra-Specific Table Body Background */
        html.dark #tableBodyUsers tr,
        html.dark tbody#tableBodyUsers tr {
            background-color: transparent !important;
        }

        html.dark #tableBodyUsers tr:hover,
        html.dark tbody#tableBodyUsers tr:hover {
            background-color: #334155 !important;
        }

        /* Table Body Divider */
        html.dark tbody.divide-y.divide-gray-100 {
            border-color: #334155 !important;
        }

        html.dark tbody.divide-y.divide-gray-100 > tr {
            border-bottom-color: #334155 !important;
        }

        /* Vibrant Stats Cards in Dark Mode */
        html.dark .bg-blue-50 {
            background-color: #1e3a8a !important; /* blue-900 solid */
        }

        html.dark .bg-emerald-50 {
            background-color: #065f46 !important; /* emerald-800 solid */
        }

        /* Indigo accents - only for icon circles, not card backgrounds */
        html.dark .bg-indigo-100 {
            background-color: #4338ca !important; /* indigo-700 for icon circle */
        }

        html.dark .border-indigo-100 {
            border-color: #6366f1 !important; /* indigo-500 for borders */
        }

        html.dark .border-indigo-800 {
            border-color: #4338ca !important; /* indigo-700 for dark borders */
        }

        /* Pink accents - only for icon circles and borders */
        html.dark .bg-pink-100 {
            background-color: #be185d !important; /* pink-700 for icon circle */
        }

        html.dark .border-pink-100 {
            border-color: #ec4899 !important; /* pink-500 for borders */
        }

        html.dark .border-pink-800 {
            border-color: #be185d !important; /* pink-700 for dark borders */
        }

        html.dark .text-pink-600 {
            color: #fbcfe8 !important; /* pink-200 */
        }

        html.dark .text-pink-400 {
            color: #fbcfe8 !important; /* pink-200 */
        }

        /* Amber accents */
        html.dark .bg-amber-100 {
            background-color: #b45309 !important; /* amber-700 for icon circle */
        }

        html.dark .border-amber-100 {
            border-color: #f59e0b !important; /* amber-500 for borders */
        }

        html.dark .border-amber-800 {
            border-color: #b45309 !important; /* amber-700 for dark borders */
        }

        html.dark .text-amber-600 {
            color: #fde68a !important; /* amber-200 */
        }

        html.dark .text-amber-400 {
            color: #fde68a !important; /* amber-200 */
        }

        /* Blue accents */
        html.dark .bg-blue-100 {
            background-color: #1e40af !important; /* blue-800 for icon circle */
        }

        html.dark .border-blue-100 {
            border-color: #3b82f6 !important; /* blue-500 for borders */
        }

        html.dark .border-blue-800 {
            border-color: #1e40af !important; /* blue-800 for dark borders */
        }

        /* Emerald accents */
        html.dark .bg-emerald-100 {
            background-color: #047857 !important; /* emerald-700 for icon circle */
        }

        html.dark .border-emerald-100 {
            border-color: #10b981 !important; /* emerald-500 for borders */
        }

        html.dark .border-emerald-800 {
            border-color: #047857 !important; /* emerald-700 for dark borders */
        }

        html.dark .text-emerald-600 {
            color: #a7f3d0 !important; /* emerald-200 */
        }

        html.dark .text-emerald-400 {
            color: #a7f3d0 !important; /* emerald-200 */
        }

        /* Red accents */
        html.dark .bg-red-100 {
            background-color: #b91c1c !important; /* red-700 for icon circle */
        }

        html.dark .border-red-100 {
            border-color: #ef4444 !important; /* red-500 for borders */
        }

        html.dark .border-red-800 {
            border-color: #b91c1c !important; /* red-700 for dark borders */
        }

        html.dark .text-red-600 {
            color: #fecaca !important; /* red-200 */
        }
        /* This line seems to be a duplicate and should be removed or corrected if it's part of another rule.
           Assuming it's a misplaced closing brace and a duplicate color declaration, I will remove it
           as it makes the CSS syntactically incorrect. */
        /* The instruction implies keeping the structure around it, so I'll remove the extra line and brace. */

        /* Critical State Badges - Darker backgrounds for better contrast */
        html.dark .bg-amber-900\/50 {
            background-color: #78350f !important; /* amber-900 solid */
        }

        html.dark .bg-red-900\/50 {
            background-color: #7f1d1d !important; /* red-900 solid */
        }

        html.dark .text-blue-700:not(.bg-blue-50 *):not(.bg-blue-50/50 *) {
            color: #93c5fd !important; /* blue-300 */
        }

        html.dark .text-emerald-700:not(.bg-emerald-50 *):not(.bg-emerald-50/50 *) {
            color: #6ee7b7 !important; /* emerald-300 */
        }

        html.dark .text-gray-700:not(.bg-gray-50 *):not(.bg-gray-50/50 *) {
            color: #cbd5e1 !important; /* slate-300 */
        }

        html.dark .text-indigo-600:not(.bg-indigo-50 *):not(.bg-indigo-50\/50 *) {
            color: #c7d2fe !important; /* indigo-200 */
        }

        html.dark .text-indigo-400 {
            color: #c7d2fe !important; /* indigo-200 */
        }

        html.dark .text-blue-900 {
            color: #dbeafe !important; /* blue-100 */
        }

        html.dark .text-emerald-900 {
            color: #d1fae5 !important; /* emerald-100 */
        }

        html.dark .border-blue-200 {
            border-color: #3b82f6 !important; /* blue-500 */
        }

        html.dark .border-emerald-200 {
            border-color: #10b981 !important; /* emerald-500 */
        }

        /* Tabs Container - Transparent Background with Border */
        html.dark [role="tablist"][data-slot="tabs-list"] {
            background-color: transparent !important;
            border: 1px solid #4b5563 !important; /* gray-600 */
        }

        /* Active Tab - Vibrant Highlight */
        html.dark button.tab-trigger[data-state="active"],
        html.dark button.tab-trigger[aria-selected="true"] {
            background-color: #2563eb !important; /* blue-600 vibrant */
            color: #ffffff !important;
            border: 2px solid #60a5fa !important; /* blue-400 bright border */
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1) !important;
        }

        /* Card Action Buttons - White Text */
        html.dark button.text-gray-700,
        html.dark button[class*="text-gray-"] {
            color: #ffffff !important;
        }

        /* Status Badges - Darker Green for Better Contrast */
        html.dark .bg-emerald-100 {
            background-color: #047857 !important; /* emerald-700 darker */
        }

        html.dark .text-emerald-700 {
            color: #d1fae5 !important; /* emerald-100 light text */
        }

        /* Exception: Don't override text colors in stat cards */
        html.dark .bg-gray-50 p.text-gray-700,
        html.dark .bg-blue-50 p.text-blue-700,
        html.dark .bg-emerald-50 p.text-emerald-700 {
            color: inherit;
        }
        /* Custom Dark Badges */
        html.dark .badge-dark-amber {
            background-color: #451a03 !important; /* amber-950 hex */
            border-color: #78350f !important; /* amber-900 border */
        }

        html.dark .badge-dark-red {
            background-color: #450a0a !important; /* red-950 hex */
            border-color: #7f1d1d !important; /* red-900 border */
        }

        html.dark .badge-dark-emerald {
            background-color: #022c22 !important; /* emerald-950 hex */
            border-color: #064e3b !important; /* emerald-900 border */
        }

        /* Label visibility improvements for dark mode */
        html.dark label,
        html.dark label.text-gray-700,
        html.dark label.text-gray-600 {
            color: #e5e7eb !important; /* gray-200 - much lighter */
        }

        html.dark label.text-gray-500 {
            color: #d1d5db !important; /* gray-300 */
        }
    </style>
</head>
<body>
    <div id="root">
        <div class="flex h-screen bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
            @include('layouts.partials.sidebar2')

            <div class="flex-1 flex flex-col overflow-hidden w-full lg:w-auto">
                @include('layouts.partials.header', ['titleHeader' => isset($pageTitle) ? $pageTitle : 'Hospital'])

                <main class="flex-1 overflow-auto bg-gray-50 dark:bg-gray-900 flex flex-col transition-colors duration-300">
                @yield('content')
                @include('layouts.partials.footer')
                </main>

            </div>
        </div>
    </div>

    @stack('modals')
    @stack('scripts')
</body>
</html>