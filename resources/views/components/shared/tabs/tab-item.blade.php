<div
    x-data="{
        id: '{{ \Str::slug($name) }}'
    }"
    x-show="selected==id"

    {{ $attributes->merge([
        'class' => 'col-span-12',
        'id' => \Str::slug($name),
    ]) }}
    style="display: none;">
    {{ $slot }}
</div>
