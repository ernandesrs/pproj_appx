<?php

namespace App\Livewire;

class BaseComponent extends \Livewire\Component
{
    /**
     * Layout
     * @throws \Exception
     * @return string
     */
    public function layout(): string
    {
        throw new \Exception('Override "public function layout()" by returning the path to the layout view');
    }

    /**
     * Prepend Title
     * @throws \Exception
     * @return string
     */
    public function prependTitle(): string
    {
        throw new \Exception('Override "public function prependTitle()" by returning the prepend title');
    }

    /**
     * Render
     * @param string $viewPath
     * @param array $data
     * @param array $layoutData
     * @param array $mergeData
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function renderView(string $viewPath, array $data = [], array $mergeData = []): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view($viewPath, $data, $mergeData)
            ->layout($this->layout(), [
                'title' => $this->prependTitle() . ' | ' . ($data['pageTitle'] ?? 'Untitled page')
            ]);
    }
}
