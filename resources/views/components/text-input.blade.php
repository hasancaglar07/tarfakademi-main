@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge([
    'class' => 'w-full border border-gray-200 focus:border-gray-400 focus:ring-0 rounded-lg text-sm px-3 py-2 transition-colors ' . ($disabled ? 'bg-gray-50' : 'bg-white')
]) }}>
