<div
    x-data="{
        visible: false,
        boundClickoutHandler: null,

        init() {
            this.boundClickoutHandler = this.clickoutHandler.bind(this);
        },


        activatorClicked() {
            this.visible ? this.close() : this.show();
        },

        show() {
            this.visible = true;

            document.addEventListener('click', this.boundClickoutHandler);
        },

        close() {
            this.visible = false;

            document.removeEventListener('click', this.boundClickoutHandler);
        },

        clickoutHandler(event) {
            if ($el.contains(event.target)) return;

            this.close();
        }
    }"
    class="
    relative">
    <div
        x-on:click="activatorClicked">
        {{ $activator ?? null }}
    </div>

    <div
        x-show="visible"

        x-transition:enter="duration-200 ease-in"
        x-transition:enter-start="opacity-0 scale-90 -translate-y-1/12 translate-x-1/12 -skew-3"
        x-transition:enter-end="opacity-100 scale-100 -translate-y-0 translate-x-0"

        x-transition:leave="duration-200 ease-in-out"
        x-transition:leave-start="opacity-100 scale-100 -translate-y-0 translate-x-0"
        x-transition:leave-end="opacity-0 scale-90 -translate-y-1/12 translate-x-1/12 skew-3"

        {{ $attributes->merge([
            'class' => 'absolute ' . ['left' => 'left-0', 'right' => 'right-0'][$getLocation()],
        ]) }}
        style="display: none; z-index: 999;">
        {{ $content ?? $slot }}
    </div>
</div>
