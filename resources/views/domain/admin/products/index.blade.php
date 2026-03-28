<x-admin-layout>
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-extrabold text-gray-800">Product Management</h1>
        <a href="{{ route('admin.products.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-lg font-medium transition shadow-md">
            + New Product
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="text-gray-400 border-b border-gray-100">
                    <th class="pb-4 font-semibold uppercase text-xs">Product Name</th>
                    <th class="pb-4 font-semibold uppercase text-xs text-center">Price</th>
                    <th class="pb-4 font-semibold uppercase text-xs text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach ($products as $product)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-5 font-medium text-gray-700">{{ $product->name }}</td>
                        <td class="py-5 text-center text-gray-600 font-mono">R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                        <td class="py-5 text-right space-x-4">
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold">Edit</a>

                            <form action="{{ route('admin.products.destroy', $product) }}" method="post" class="inline">
                                @csrf @method('delete')
                                <button type="submit" class="text-red-400 hover:text-red-600 font-medium" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
