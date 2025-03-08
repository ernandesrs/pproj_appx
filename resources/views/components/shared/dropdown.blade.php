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

        {{ $attributes->merge([
            'class' => 'absolute ' . ['left' => 'left-0', 'right' => 'right-0'][$getLocation()],
        ]) }}
        style="display: none; z-index: 999;">
        {{ $content ?? $slot }}
    </div>
</div>
