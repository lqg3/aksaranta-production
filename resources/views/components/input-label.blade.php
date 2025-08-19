@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm font-title dark:text-white']) }}>
    {{ $value ?? $slot }}
</label>
