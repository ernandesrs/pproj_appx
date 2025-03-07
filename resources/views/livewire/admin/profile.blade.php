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

            <x-shared.form.field
                class="col-span-12 sm:col-span-6"
                type="select"
                name="gender"
                :selected-value="\App\Enums\UserGendersEnum::UNDEFINED->value"
                :options="collect(\App\Enums\UserGendersEnum::cases())
                    ->map(fn($gender) => ['label' => $gender->label(), 'value' => $gender->value])
                    ->toArray()" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6"
                type="file"
                name="file_field" />

            <x-shared.form.field
                class="col-span-12"
                type="textarea"
                name="textarea_field"
                value="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum quas dolorum accusantium ad eum ratione nulla dignissimos mod." />
        </x-shared.form.form>
    </x-shared.card>

</x-shared.panel.page-base>
