<?php

namespace App\Livewire\Admin;

class ComponentsOverview extends \App\Livewire\Admin\AdminBaseComponent
{
    /**
     * Render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return $this->renderView(
            'livewire..admin.components-overview',
            $this->page()->addTitle('Visão geral dos componentes')
                ->addBreadcrumb('Componentes', route('admin.componentsOverview'), true)
        );
    }
}
