<x-shared.panel.page-base
    title="Meu perfil">

    <x-shared.card
        class="col-span-12">
        <x-shared.form.form
            method="post"
            action="#"
            submit-text="Atualizar perfil"
            :inline="false">

            <x-shared.form.field
                class="col-span-12 sm:col-span-6"
                type="text"
                name="first_name"
                value="{{ $profile->first_name }}" error="Um erro aconteceu aqui" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6"
                type="text"
                name="last_name"
                value="{{ $profile->last_name }}" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3"
                type="text"
                name="username"
                value="{{ $profile->username }}" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3"
                type="number"
                name="age"
                value="43" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3"
                type="date"
                name="created_at"
                value="{{ $profile->created_at->format('Y-m-d') }}" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3"
                type="email"
                name="email"
                value="{{ $profile->email }}" disabled />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6"
                type="password"
                name="password" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6"
                type="password"
                name="password_confirmation" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6"
                type="checkbox"
                name="checkbox_field" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6"
                type="radio"
                name="radio_field" />

        </x-shared.form.form>
    </x-shared.card>

</x-shared.panel.page-base>
