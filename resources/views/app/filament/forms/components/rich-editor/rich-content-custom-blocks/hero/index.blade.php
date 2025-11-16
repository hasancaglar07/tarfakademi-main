<section class="py-20 lg:py-16 md:py-12 relative overflow-hidden {{ ($theme ?? 'light') === 'dark' ? 'bg-black text-white' : 'bg-white text-black' }}">
    @php $image = $image ?? $image_url ?? null; @endphp
    @if(!empty($image))
        <div class="absolute inset-0 -z-10">
            <img src="{{ is_string($image) ? $image : (is_array($image) ? ($image['url'] ?? '') : '') }}" alt="" class="w-full h-full object-cover" />
            <div class="absolute inset-0 {{ ($theme ?? 'light') === 'dark' ? 'bg-black/50' : 'bg-white/20' }}"></div>
        </div>
    @endif
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            @isset($title)
                <h2 class="text-4xl font-semibold tracking-tight mb-4">{{ $title }}</h2>
            @endisset
            @isset($subtitle)
                <p class="text-lg opacity-80 mb-8">{{ $subtitle }}</p>
            @endisset
            @if(!empty($button_text) && !empty($button_url))
                <a href="{{ $button_url }}" class="inline-flex items-center justify-center rounded-md px-6 py-3 font-medium {{ ($theme ?? 'light') === 'dark' ? 'bg-white text-black hover:bg-white/90' : 'bg-black text-white hover:bg-black/90' }}">
                    {{ $button_text }}
                </a>
            @endif
        </div>
    </div>
</section>


