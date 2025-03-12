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
            $this->page()->addTitle(trans_choice('words.o.overview', 1))
                ->withoutTitle()
        );
    }

    public function emitFeedbackTest()
    {
        $this->feedbackGlobal()->success('Mensagem do feedback de teste.')->toLivewire($this);
    }
}
