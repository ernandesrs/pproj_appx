<?php

namespace App\View\Components\Shared\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Field extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public ?string $label = null,
        public string $type = 'text',
        public ?string $error = null,

        public ?string $selectedValue = null,
        public array $options = [],

        public bool $small = false,
        public bool $square = false,
    ) {
    }

    public function getType(): string
    {
        return in_array(
            $this->type,
            ['text', 'number', 'email', 'password', 'date']
        ) ? $this->type : 'text';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components..shared.form.field');
    }
}
