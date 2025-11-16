@php
    $variant = $variant ?? 'info';
    $base = 'p-4 rounded-md border';
    $classes = [
        'info' => $base.' bg-blue-50 border-blue-200 text-blue-900',
        'success' => $base.' bg-green-50 border-green-200 text-green-900',
        'warning' => $base.' bg-yellow-50 border-yellow-200 text-yellow-900',
        'danger' => $base.' bg-red-50 border-red-200 text-red-900',
    ][$variant] ?? $base;
    if (!empty($color)) {
        $classes = $base;
    }
@endphp
<div class="{{ $classes }}" @if(!empty($color)) style="border-color: {{ $color }}; background-color: {{ $color }}20; color: {{ $color }};" @endif>
    @isset($title)
        <div class="font-semibold mb-1">{{ $title }}</div>
    @endisset
    @isset($content)
        <div class="text-sm">{{ $content }}</div>
    @endisset
</div>


