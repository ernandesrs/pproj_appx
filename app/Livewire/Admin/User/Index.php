<?php

namespace App\Livewire\Admin\User;

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
            'livewire..admin.user.index',
            $this->page()->addTitle(trans_choice('words.u.user', 2))
                ->addBreadcrumb(trans_choice('words.u.user', 2), route('admin.users.index'), true),
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
        return ['first_name', 'last_name', 'username'];
    }

    /**
     * Model Instance
     * @return \App\Models\User|\Illuminate\Database\Eloquent\Builder
     */
    public function modelInstance(): Model|Builder
    {
        return new \App\Models\User();
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
                'view' => 'livewire.admin.user.includes.user-name'
            ],
            [
                'label' => 'Usuário',
                'key' => 'username'
            ],
            [
                'label' => 'E-mail',
                'key' => 'email'
            ]
        ];
    }
}
