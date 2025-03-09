<div
    x-show="visible"
    x-on:evt__feedback_add.window="feedbackFromEvent"
    x-data="{
        id: '{{ $id }}',
        data: {{ json_encode($getFeedback()) }},
        visible: false,
        withTimer: false,

        init() {

            if (!this.data || !this.data?.message?.length) return;

            this.show();
        },

        feedbackFromEvent(event) {
            const feedback = event.detail[0]?.feedback;
            if (!feedback) return;

            if (this.visible) {
                this.close();
                setTimeout(() => {
                    this.data = feedback;
                    this.show();
                }, 200);
            } else {
                this.data = feedback;
                this.show();
            }
        },

        show() {
            setTimeout(() => {
                this.visible = true;

                if (!this.data?.fixed) {
                    setTimeout(() => {
                        $el.classList.add('animate-shake');
                        setTimeout(() => {
                            $el.classList.remove('animate-shake');
                        }, 350);
                    }, 225);
                }
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
        'feedback_default': data?.type == 'default',
        'feedback_success': data?.type == 'success',
        'feedback_info': data?.type == 'info',
        'feedback_danger': data?.type == 'danger',
        'feedback_error': data?.type == 'error',
        'feedback_warning': data?.type == 'warning',

        'feedback_fixed': data?.fixed,
        'feedback_float': !data?.fixed,
    }"

    x-transition:enter="duration-200 ease-in"
    x-transition:enter-start="opacity-0 -translate-y-0.5"
    x-transition:enter-end="opacity-100 -translate-y-0"

    x-transition:leave="duration-200 ease-in-out"
    x-transition:leave-start="opacity-100 -translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-0.5"

    style="display: none;">

    <div class="relative z-10 text-3xl sm:text-4xl">
        <span x-show="data?.type == 'default'">
            <x-shared.icon icon="info-circle" />
        </span>
        <span x-show="data?.type == 'success'">
            <x-shared.icon icon="check-circle" />
        </span>
        <span x-show="data?.type == 'info'">
            <x-shared.icon icon="info-circle" />
        </span>
        <span x-show="data?.type == 'danger'">
            <x-shared.icon icon="exclamation-circle" />
        </span>
        <span x-show="data?.type == 'error'">
            <x-shared.icon icon="x-circle" />
        </span>
        <span x-show="data?.type == 'warning'">
            <x-shared.icon icon="exclamation-circle" />
        </span>
    </div>

    <div class="relative z-10 flex-1 px-5">
        <span x-show="data?.title" class="font-medium" x-text="data?.title"></span>
        <p x-text="data?.message"></p>
    </div>

    <x-shared.clickable x-on:click="close" class="relative z-10 hover:!scale-100" icon="x-lg" style="danger"
        variant="flat"
        small />

    <div x-show="withTimer" class=" w-full h-1 absolute z-10 left-0 bottom-0">
        <div class="feedback_timer h-full" style="width: 100px;"></div>
    </div>

    <div class="feedback_bg absolute z-0 top-0 left-0 w-full h-full"></div>
</div>
