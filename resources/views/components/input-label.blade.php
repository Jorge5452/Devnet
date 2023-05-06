@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm text-white font-bold uppercase pb-4']) }}>
    {{ $value ?? $slot }}
</label>
