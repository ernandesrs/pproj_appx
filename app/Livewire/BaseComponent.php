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
     * Page configurator
     * @return \App\Support\PageConfigurator
     */
    public function page(): \App\Support\PageConfigurator
    {
        return \App\Support\PageConfigurator::start();
    }

    /**
     * Render
     * @param string $viewPath
     * @param \App\Support\PageConfigurator $page
     * @param array $data
     * @param array $layoutData
     * @param array $mergeData
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function renderView(string $viewPath, \App\Support\PageConfigurator $page, array $data = [], array $mergeData = []): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view($viewPath, $data, $mergeData)
            ->with('page', $page)
            ->layout($this->layout(), [
                'title' => $this->prependTitle() . ' | ' . $page->getTitle()
            ]);
    }
}
