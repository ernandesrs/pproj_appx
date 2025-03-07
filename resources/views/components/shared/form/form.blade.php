<form
    {{ $attributes->merge([
        'class' => 'flex gap-y-3 ' . ($inline ? 'flex-row gap-x-1' : 'flex-col'),
        'method' => $method,
        'action' => $action,
    ]) }}
    enctype="multipart/form-data">
    <div class="grid grid-cols-12 {{ $inline ? 'flex-1' : '' }}">
        {{ $slot }}
    </div>
    <div class="flex justify-center">
        <x-shared.clickable
            prepend-icon="check-lg"
            :text="$submitText" />
    </div>
</form>
