<x-shared.panel.page-base :page="$page">

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
                label="Nome"
                name="first_name"
                value="{{ $profile->first_name }}" error="Um erro aconteceu aqui" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6"
                type="text"
                label="Sobrenome"
                name="last_name"
                value="{{ $profile->last_name }}" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3"
                type="text"
                label="Usuário"
                name="username"
                value="{{ $profile->username }}" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3"
                type="number"
                label="Idade"
                name="age"
                value="43" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3"
                type="date"
                label="Data"
                name="created_at"
                value="{{ $profile->created_at->format('Y-m-d') }}" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3"
                type="email"
                label="E-mail"
                name="email"
                value="{{ $profile->email }}" disabled />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6"
                type="password"
                label="Senha"
                name="password" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6"
                type="password"
                label="Confirmar senha"
                name="password_confirmation" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6"
                type="checkbox"
                label="Checkbox label"
                name="checkbox_field" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6"
                type="radio"
                label="Radio label"
                name="radio_field" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6"
                type="select"
                label="Gênero"
                name="gender"
                :selected-value="\App\Enums\UserGendersEnum::UNDEFINED->value"
                :options="collect(\App\Enums\UserGendersEnum::cases())
                    ->map(fn($gender) => ['label' => $gender->label(), 'value' => $gender->value])
                    ->toArray()" />

            <x-shared.form.field
                class="col-span-12 sm:col-span-6"
                type="file"
                label="File label"
                name="file_field" />

            <x-shared.form.field
                class="col-span-12"
                type="textarea"
                label="Biography"
                name="textarea_field"
                value="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum quas dolorum accusantium ad eum ratione nulla dignissimos mod." />
        </x-shared.form.form>
    </x-shared.card>

</x-shared.panel.page-base>
