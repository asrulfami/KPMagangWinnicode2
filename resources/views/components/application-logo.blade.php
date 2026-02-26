@props(['class' => ''])

<div {{ $attributes->merge(['class' => $class]) }}>
    <img src="{{ asset('images/LogoWinnicode.png') }}" alt="Winnicode Logo" class="w-full h-full object-contain" />
</div>
