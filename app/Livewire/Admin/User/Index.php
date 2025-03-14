<?php

namespace App\Livewire\Admin\User;

class Index extends \App\Livewire\Admin\AdminBaseComponent
{
    use \App\Traits\PageListTrait;

    /**
     * Model Instance
     * @return \App\Models\User|\Illuminate\Database\Eloquent\Builder
     */
    public function modelInstance(): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
    {
        return (new \App\Models\User());
    }

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
}
