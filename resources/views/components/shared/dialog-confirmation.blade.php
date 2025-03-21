<div
    x-data="{
        id: '{{ $id }}',

        confirmed() {
            $dispatch('evt__confirmation_confirmed_' + this.id);
            $dispatch('evt__confirmation_confirmed', {
                id: this.id
            });
        },

        canceled() {
            $dispatch('evt__confirmation_canceled_' + this.id);
            $dispatch('evt__confirmation_canceled', {
                id: this.id
            });

            $dispatch('evt__dialog_close', { id: '{{ $id }}' });
        },
    }">
    <x-shared.dialog
        :title="$title"
        :id="$id"
        size="base">

        <p class="mb-5">{{ $message }}</p>

        <div class="flex justify-between items-center gap-2">
            <x-shared.clickable
                x-on:click="confirmed"
                prepend-icon="check-lg"
                text="{{ $confirmationText }}"
                style="danger" />

            <x-shared.clickable
                x-on:click="canceled"
                prepend-icon="x-lg"
                text="{{ $cancelText }}"
                style="danger"
                variant="outlined" />
        </div>
    </x-shared.dialog>
</div>
