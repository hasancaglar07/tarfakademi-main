<div class="p-4 border rounded-md">
    <div class="text-sm opacity-70 mb-2">Hero</div>
    <div class="font-semibold">{{ $title ?? 'Hero' }}</div>
    @if(!empty($subtitle))
        <div class="text-xs opacity-70 mt-1">{{ $subtitle }}</div>
    @endif
</div>


