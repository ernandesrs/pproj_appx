<form
    x-on:submit="submit"
    x-data="{
        oa: null,

        submit(event) {
            event.preventDefault();
        },
        clear() {
            $el.reset();
        }
    }"

    {{ $attributes->merge([
        'class' => 'flex gap-y-3 ' . ($inline ? 'flex-row gap-x-1' : 'flex-col'),
        'method' => $method,
        'action' => $action,
    ]) }}
    enctype="multipart/form-data">
    <div class="grid grid-cols-12 gap-5 {{ $inline ? 'flex-1' : '' }}">
        {{ $slot }}
    </div>
    <div class="flex gap-2 justify-center">
        @if ($clearable)
            <x-shared.clickable
                x-on:click='clear'
                type="button"
                prepend-icon="x-lg"
                style="danger"
                variant="flat"
                :text="$clearText" />
        @endif

        <x-shared.clickable
            type="submit"
            prepend-icon="check-lg"
            :text="$submitText" />
    </div>
</form>
