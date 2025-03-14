<x-shared.panel.page-base :page="$page">

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
            @foreach ($items as $item)
                <x-shared.table.row>
                    <x-shared.table.cell :value="$item->id" />
                    <x-shared.table.cell :value="$item->first_name . ' ' . $item->last_name" />
                    <x-shared.table.cell :value="$item->username" />
                    <x-shared.table.cell :value="$item->email" />
                    <x-shared.table.cell :value="$item->created_at->format('d/m/Y H:i')" />
                </x-shared.table.row>
            @endforeach
        </x-slot:tbody>
    </x-shared.table.table>

    <div class="col-span-12 flex justify-center">
        {{ $items->links() }}
    </div>

</x-shared.panel.page-base>
