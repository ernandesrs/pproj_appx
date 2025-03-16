<div
    x-on:evt__dialog_show.window="dialogActivatorClicked"
    x-on:evt__dialog_close.window="dialogCloserClicked"
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

        dialogCloserClicked(event) {
            const controls = event?.detail?.id;
            if (controls != this.id) return;

            this.close();
        },

        show() {
            $dispatch('evt__dialog_showing', {
                dialog_id: this.id
            });
            this.backdropVisible = true;
            setTimeout(() => {
                this.contentVisible = true;
                $dispatch('evt__dialog_showed', {
                    dialog_id: this.id
                });
            }, 200);
        },

        close() {
            $dispatch('evt__dialog_closing', {
                dialog_id: this.id
            });
            this.contentVisible = false;
            setTimeout(() => {
                this.backdropVisible = false;
                $dispatch('evt__dialog_closed', {
                    dialog_id: this.id
                });
            }, 200);
        },

        bounce(event) {
            const dialogContent = $refs['dialogContent'];

            if (!dialogContent || event.target == dialogContent || dialogContent.contains(event.target)) return;

            dialogContent.classList.add('animate-shake')
            setTimeout(() => {
                dialogContent.classList.remove('animate-shake')
            }, 200);
        }
    }"
    x-show="backdropVisible"
    x-on:click="bounce"

    x-transition:enter="duration-200"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"

    x-transition:leave="duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"

    class="
        fixed top-0 left-0 z-50
        flex justify-center items-start
        w-full h-screen
        bg-zinc-700/50 dark:bg-zinc-800/50
        p-5"
    style="display: none;">

    <x-shared.card
        x-ref="dialogContent"
        x-show="contentVisible"

        x-transition:enter="duration-200 ease-in"
        x-transition:enter-start="scale-90 opacity-0 -translate-y-1/2"
        x-transition:enter-end="scale-100 opacity-100 -translate-y-0"

        x-transition:leave="duration-100 ease-in-out"
        x-transition:leave-start="scale-100 opacity-100 -translate-y-0"
        x-transition:leave-end="scale-90 opacity-0 -translate-y-1/2"

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
