<x-admin-layout>
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                New Product
            </h2>
        </div>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" class="max-w-lg bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        @csrf

        <x-domain.admin.input label="Product Name" name="name" placeholder="Ex: T-Shirt" />

        <x-domain.admin.input label="Price (USD)" name="price" type="number" step="0.01" placeholder="0.00" />

        <div class="mt-6 flex items-center justify-end space-x-3">
            <a href="{{ route('admin.products.index') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900">
                Cancel
            </a>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </form>
</x-admin-layout>
