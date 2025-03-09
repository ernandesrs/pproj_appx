<?php

namespace App\Livewire\Admin;

class Overview extends \App\Livewire\Admin\AdminBaseComponent
{
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
