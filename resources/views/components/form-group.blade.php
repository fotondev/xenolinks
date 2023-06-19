@props(['value', 'label'])

<div class="mb-4">
    <label for="{{ $label }}" {{ $attributes->merge(['class' => 'block text-gray-300 font-bold mb-2']) }}>
        {{ $value }}
    </label>
    {{ $slot }}
</div>
