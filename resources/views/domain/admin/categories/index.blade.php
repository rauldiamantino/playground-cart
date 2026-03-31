<x-admin-layout>
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-extrabold text-gray-800">Category Management</h1>
        <a href="{{ route('admin.categories.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-lg font-medium transition shadow-md">
            + New Category
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-gray-400 border-b border-gray-100 bg-gray-50/50">
                        <th class="px-6 py-4 font-semibold uppercase text-xs">Category Name</th>
                        <th class="px-6 py-4 font-semibold uppercase text-xs text-center">Parent</th>
                        <th class="px-6 py-4 font-semibold uppercase text-xs text-center">Status</th>
                        <th class="px-6 py-4 font-semibold uppercase text-xs text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse ($categories as $category)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-5">
                                <div class="font-medium text-gray-700">{{ $category->name }}</div>
                                <div class="text-xs text-gray-400 font-mono">{{ $category->slug }}</div>
                            </td>
                            <td class="px-6 py-5 text-center text-gray-600 text-sm">
                                {{ $category->parent?->name ?? '—' }}
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="px-2 py-1 text-xs font-bold rounded-full
                                    {{ $category->status->value === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                    {{ strtoupper($category->status->value) }}
                                </span>
                            </td>
                            <td class="px-6 py-5 text-right space-x-4">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold transition">Edit</a>

                                <form action="{{ route('admin.categories.destroy', $category) }}" method="post" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                            class="text-red-400 hover:text-red-600 font-medium transition"
                                            onclick="return confirm('Attention: If this category has subcategories, it cannot be deleted. Proceed?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-gray-400">
                                No categories found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $categories->links() }}
    </div>
</x-admin-layout>
