<div
    x-on:evt__dialog_activate.window="dialogActivatorClicked"
    x-data="{
        id: '{{ $id }}',
        backdropVisible: false,
        contentVisible: false,

        init() {},

        dialogActivatorClicked(event) {
            const controls = event?.detail?.id;
            if (controls != this.id) return;

            this.show();
        },

        show() {
            this.backdropVisible = true;
            setTimeout(() => {
                this.contentVisible = true;
            }, 100);
        },

        close() {
            this.contentVisible = false;
            setTimeout(() => {
                this.backdropVisible = false;
            }, 100);
        }
    }"
    x-show="backdropVisible"
    class="
        fixed top-0 left-0 z-50
        flex justify-center items-start
        w-full h-screen
        bg-zinc-600/50
        p-5">

    <x-shared.card
        x-show="contentVisible"

        class="w-full {{ [
            'sm' => 'max-w-[375px]',
            'base' => 'max-w-[575px]',
            'lg' => 'max-w-[775px]',
            'xl' => 'max-w-[975px]',
        ][$getSize()] }}"
        :icon="$icon ?? ''"
        :title="$title">

        <x-slot:actions>
            <x-shared.clickable
                x-on:click="close"
                icon="x-lg"
                style="danger"
                variant="flat"
                small />
        </x-slot:actions>

        {{ $slot }}

    </x-shared.card>

</div>
