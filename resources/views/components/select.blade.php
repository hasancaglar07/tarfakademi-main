@props(['disabled' => false])

<select @disabled($disabled) {{ $attributes->merge([
    'class' => 'w-full border border-gray-200 focus:border-gray-400 focus:ring-0 rounded-lg text-sm px-3 py-2 transition-colors appearance-none bg-[url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 20 20\'%3E%3Cpath stroke=\'%236b7280\' stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'m6 8 4 4 4-4\'/%3E%3C/svg%3E")] bg-[length:1.25em_1.25em] bg-[right_0.5rem_center] bg-no-repeat ' . ($disabled ? 'bg-gray-50' : 'bg-white')
]) }}>
    {{ $slot }}
</select>
