<x-admin-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Update: {{ $product->name }}</h2>
        <p class="text-sm text-gray-500">Update the information below to update the catalog.</p>
    </div>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="max-w-2xl bg-white p-8 rounded-xl shadow-sm border border-gray-100">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-domain.admin.input label="Product Name" name="name" :value="$product->name" placeholder="Ex: T-Shirt" />
            <x-domain.admin.input label="Price (USD)" name="price" type="number" step="0.01" :value="$product->price" />
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end space-x-4">
            <a href="{{ route('admin.products.index') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900 transition">
                Cancel
            </a>
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2.5 rounded-lg font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-100">
                Update
            </button>
        </div>
    </form>
</x-admin-layout>
