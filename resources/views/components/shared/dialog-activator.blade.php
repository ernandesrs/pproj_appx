<x-shared.clickable
    x-data="{
        id: '{{ $controls }}',
        activatorClicked(event) {
            $dispatch('evt__dialog_show', {
                id: this.id,
                activator: $el
            })
        }
    }"
    x-on:click="activatorClicked"
    {{ $attributes->merge([]) }} />
