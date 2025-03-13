<x-shared.panel.page-base :page="$page">

    <x-shared.card
        class="col-span-12">
        <x-shared.form.form
            wire:submit='update'
            method="post"
            action="#"
            submit-text="Atualizar perfil"
            :inline="false">
            @include('livewire.shared.includes.user-basic-data')
        </x-shared.form.form>
    </x-shared.card>

</x-shared.panel.page-base>
