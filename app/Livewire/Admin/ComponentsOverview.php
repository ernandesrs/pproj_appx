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
        \App\Helpers\Feedback::to('admin_global')->default('Este é um feedback armazenado na sessão!')->toSession();

        return $this->renderView(
            'livewire..admin.components-overview',
            $this->page()->addTitle('Visão geral dos componentes')
                ->addBreadcrumb('Componentes', route('admin.componentsOverview'), true)
        );
    }

    public function emitFeedbackTest()
    {
        $this->feedbackGlobal()->success('Mensagem do feedback de teste.')->toLivewire($this);
    }
}
