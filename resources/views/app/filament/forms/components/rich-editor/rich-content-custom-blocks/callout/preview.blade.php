<div class="p-3 border rounded-md">
    <div class="text-sm opacity-70 mb-1">Callout</div>
    <div class="font-semibold">{{ $title ?? 'Callout' }}</div>
    @if(!empty($content))
        <div class="text-xs opacity-70 mt-1">{{ Str::limit($content, 60) }}</div>
    @endif
</div>


