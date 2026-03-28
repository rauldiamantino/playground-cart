@props(['label', 'name', 'value' => ''])

<div class="mb-5">
    <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700 mb-1">{{ $label }}</label>
    <input
        type="text"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
        {{ $attributes }}
    >
    @error($name)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
