<?php

namespace App\Livewire\Admin\User;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Administrators extends \App\Livewire\Admin\AdminBaseComponent
{
    use \App\Traits\PageListTrait;

    /**
     * Mount
     * @return void
     */
    public function mount()
    {
        $this->defaultBetweenDatesFields = [];
        $this->defaultSortableFields = [];
    }

    /**
     * Render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return $this->renderView(
            'livewire..admin.user.administrators',
            $this->page()->addTitle(trans_choice('words.a.admin', 2))
                ->addBreadcrumb(trans_choice('words.a.admin', 2), route('admin.users.administrators'), true),
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
        return [];
    }

    /**
     * Model Instance
     * @return \App\Models\User|\Illuminate\Database\Eloquent\Builder
     */
    public function modelInstance(): Model|Builder
    {
        return (new \App\Models\User())->whereHas('roles', function ($query) {
            return $query->whereIn('name', \App\Enums\AdminRolesEnum::cases());
        });
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
                'label' => trans_choice('words.n.name', 1),
                'view' => 'livewire.admin.user.includes.user-name'
            ],
            [
                'label' => trans_choice('words.r.role', 2),
                'view' => 'livewire.admin.user.includes.admin-roles'
            ],
            [
                'label' => trans_choice('words.e.email', 1),
                'key' => 'email'
            ],
        ];
    }
}
