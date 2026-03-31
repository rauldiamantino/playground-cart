<x-admin-layout>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Update Category: {{ $category->name }}</h2>
        <p class="text-sm text-gray-500">Update the information below to modify the category in your catalog.</p>
    </div>

    <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="max-w-2xl bg-white p-8 rounded-xl shadow-sm border border-gray-100">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <x-domain.admin.input
                label="Category Name"
                name="name"
                :value="old('name', $category->name)"
                placeholder="Ex: Electronics"
            />

            <x-domain.admin.input
                label="Slug (URL)"
                name="slug"
                :value="old('slug', $category->slug)"
                placeholder="ex-category-url"
            />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div>
                <label for="parent_id" class="block text-sm font-medium text-gray-700">Parent Category</label>
                <select name="parent_id" id="parent_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md shadow-sm">
                    <option value="">None (Main Category)</option>
                    @foreach($parentCategories as $parent)
                        <option value="{{ $parent->id }}"
                            {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>
                            {{ $parent->name }}
                        </option>
                    @endforeach
                </select>
                @error('parent_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md shadow-sm">
                    @foreach($statuses as $status)
                        <option value="{{ $status->value }}"
                            {{ old('status', $category->status->value) == $status->value ? 'selected' : '' }}>
                            {{ ucfirst($status->value) }}
                        </option>
                    @endforeach
                </select>
                @error('status')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end space-x-4">
            <a href="{{ route('admin.categories.index') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900 transition">
                Cancel
            </a>
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2.5 rounded-lg font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-100">
                Update Category
            </button>
        </div>
    </form>
</x-admin-layout>
