<div

    {{ $attributes->merge([
        'class' => 'col-span-12 hidden',
        'id' => \Str::slug($name),
    ]) }}>
    {{ $slot }}
</div>
