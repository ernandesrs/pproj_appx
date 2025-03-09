<div
    x-show="visible"
    x-data="{
        id: '{{ $id }}',
        data: {{ json_encode($getFeedback()) }},
        visible: false,
        withTimer: true,

        init() {
            if (this.data.message.length == 0) return;

            setTimeout(() => {
                this.visible = true;
            }, 50);
        },

        close() {
            this.visible = false;
            setTimeout(() => {
                this.data = {};
            }, 200);
        }
    }"

    {{ $attributes->merge([
        'class' => 'feedback',
    ]) }}
    :class="{
        'feedback_default': data.type == 'default',
        'feedback_fixed': data.fixed,
        'feedback_float': !data.fixed,
    }"

    x-transition:enter="duration-300 ease-in"
    x-transition:enter-start="opacity-0 -translate-y-0.5"
    x-transition:enter-end="opacity-100 -translate-y-0"

    x-transition:leave="duration-200 ease-in-out"
    x-transition:leave-start="opacity-100 -translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-0.5"

    style="display: none;">

    <div class="text-3xl sm:text-4xl">
        <x-shared.icon x-show="data.type == 'default'" icon="info-circle" />
    </div>

    <div class="flex-1 px-5">
        <span class="font-medium" x-text="data.title"></span>
        <p x-text="data.message"></p>
    </div>

    <x-shared.clickable x-on:click="close" class="hover:!scale-100" icon="x-lg" style="danger" variant="flat"
        small />

    <div x-show="withTimer" class="w-full h-1 absolute left-0 bottom-0">
        <div class="feedback_timer h-full" style="width: 100px;"></div>
    </div>

</div>
