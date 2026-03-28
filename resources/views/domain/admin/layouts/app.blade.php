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
            <h2 class="text-xl font-bold mb-8">{{ tenant('id') }}</h2>
            <nav class="space-y-2">
                <a href="{{ route('admin.products.index') }}" class="block p-3 rounded hover:bg-indigo-800 transition {{ request()->routeIs('admin.products.*') ? 'bg-indigo-700' : '' }}">
                    📦 Products
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-10">
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-sm rounded-r">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>
