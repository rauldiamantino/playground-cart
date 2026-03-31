<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin' }} - {{ tenant('id') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 antialiased">
    <div class="flex min-h-screen">
    <aside class="w-64 bg-indigo-900 text-white p-6 shadow-xl">
        <div class="mb-8 flex items-center space-x-2">
            <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center">
                <span class="font-black text-white">P</span>
            </div>
            <h2 class="text-xl font-bold tracking-tight">{{ strtoupper(tenant('id')) }}</h2>
        </div>

        <nav class="space-y-1">
            <a href="{{ route('admin.categories.index') }}"
            class="flex items-center space-x-3 p-3 rounded-lg transition {{ request()->routeIs('admin.categories.*') ? 'bg-indigo-700 text-white shadow-inner' : 'text-indigo-100 hover:bg-indigo-800' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="TagIcon" /> <path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                <span class="font-medium">Categories</span>
            </a>

            <a href="{{ route('admin.products.index') }}"
            class="flex items-center space-x-3 p-3 rounded-lg transition {{ request()->routeIs('admin.products.*') ? 'bg-indigo-700 text-white shadow-inner' : 'text-indigo-100 hover:bg-indigo-800' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <span class="font-medium">Products</span>
            </a>
        </nav>
    </aside>

        <main class="flex-1 p-10">
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-sm rounded-r">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 shadow-sm rounded-r">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>
