<?php

namespace App\View\Components\Shared\Panel;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public \App\Support\PageConfigurator $page,
        public mixed $items,
        public array $filterBetweenDates = [],
        public array $filterSortableFields = []
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..shared.panel.page-list');
    }

    /**
     * Has Filter Fields
     * @return bool
     */
    public function hasFilterFields(): bool
    {
        return count($this->filterBetweenDates) || count($this->filterSortableFields);
    }
}
