<?php

namespace App\View\Components\Shared\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $action,
        public string $method = 'get',
        public string $submitText = 'Enviar',
        public string $clearText = 'Limpar formulário',
        public bool $inline = false,
        public bool $clearable = false,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..shared.form.form');
    }
}
