<x-shared.panel.page-base
    title="Usuários">

    <x-shared.table.table class="col-span-12">
        <x-slot:theader>
            <x-shared.table.row header-row>
                <x-shared.table.cell header-cell :value="'ID'" />
                <x-shared.table.cell header-cell :value="'Nome'" />
                <x-shared.table.cell header-cell :value="'Usuário'" />
                <x-shared.table.cell header-cell :value="'E-mail'" />
                <x-shared.table.cell header-cell :value="'Data de registro'" />
            </x-shared.table.row>
        </x-slot:theader>
        <x-slot:tbody>
            @foreach ($users as $user)
                <x-shared.table.row>
                    <x-shared.table.cell :value="$user->id" />
                    <x-shared.table.cell :value="$user->first_name . ' ' . $user->last_name" />
                    <x-shared.table.cell :value="$user->username" />
                    <x-shared.table.cell :value="$user->email" />
                    <x-shared.table.cell :value="$user->created_at->format('d/m/Y H:i')" />
                </x-shared.table.row>
            @endforeach
        </x-slot:tbody>
    </x-shared.table.table>

</x-shared.panel.page-base>
