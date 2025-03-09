<?php

namespace App\Livewire\Admin;

class Overview extends \App\Livewire\Admin\AdminBaseComponent
{
    /**
     * Render
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return $this->renderView(
            'livewire..admin.overview',
            [
                'pageTitle' => 'Visão geral'
            ]
        );
    }

    public function emitFeedbackTest()
    {
        $this->feedbackGlobal()->success('Mensagem do feedback de teste.')->toLivewire($this);
    }
}
