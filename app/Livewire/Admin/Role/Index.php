<?php

namespace App\Livewire\Admin\Role;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Index extends \App\Livewire\Admin\AdminBaseComponent
{
    use \App\Traits\PageListTrait;

    /**
     * Render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return $this->renderView(
            'livewire..admin.role.index',
            $this->page()->addTitle(trans_choice('words.r.role', 2))
                ->addBreadcrumb(trans_choice('words.r.role', 2), route('admin.roles.index'), true),
            [
                'items' => $this->getItems()
            ]
        );
    }

    /**
     * Searchable Fields
     * @return array
     */
    public function searchableFields(): array
    {
        return [''];
    }

    /**
     * Model Instance
     * @return \App\Models\Role|\Illuminate\Database\Eloquent\Builder
     */
    public function modelInstance(): Model|Builder
    {
        return new \App\Models\Role();
    }

    /**
     * Columns
     * @return array
     */
    public function columns(): array
    {
        return [
            [
                'label' => 'ID',
                'key' => 'id'
            ],
            [
                'label' => 'Nome',
                'view' => 'livewire.admin.role.includes.role-info'
            ],
            [
                'label' => 'Registrado',
                'view' => 'livewire.admin.role.includes.role-created_at'
            ],
            [
                'label' => 'Ações',
                'view' => 'livewire.admin.role.includes.role-actions'
            ]
        ];
    }
}
