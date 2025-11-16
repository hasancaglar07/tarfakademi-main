@props(['title' => null])
<div {{ $attributes->merge(['class' => 'bg-white p-4 sm:p-6 rounded-2xl shadow-sm']) }}>

    @if ($title)
        <h2 class="font-medium text-xl mb-6 text-pretty">{!! html_entity_decode($title) !!}</h2>
    @endif

    {{ $slot }}

</div>
