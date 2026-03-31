<x-admin-layout>
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                New Category
            </h2>
        </div>
    </div>

    <form action="{{ route('admin.categories.store') }}" method="POST" class="max-w-lg bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        @csrf

        <x-domain.admin.input
            label="Category Name"
            name="name"
            placeholder="Ex: Electronics"
            value="{{ old('name') }}"
            required
        />

        <div class="mt-4">
            <label for="parent_id" class="block text-sm font-medium text-gray-700">Parent Category</label>
            <select name="parent_id" id="parent_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                <option value="">None (Main Category)</option>
                @foreach($parentCategories as $parent)
                    <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                        {{ $parent->name }}
                    </option>
                @endforeach
            </select>
            @error('parent_id')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @foreach($statuses as $status)
                    <option value="{{ $status->value }}"
                        {{ (old('status', $category->status->value ?? '') == $status->value) ? 'selected' : '' }}>
                        {{ ucfirst($status->value) }}
                    </option>
                @endforeach
            </select>
            @error('status')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6 flex items-center justify-end space-x-3">
            <a href="{{ route('admin.categories.index') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900">
                Cancel
            </a>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save Category
            </button>
        </div>
    </form>
</x-admin-layout>
