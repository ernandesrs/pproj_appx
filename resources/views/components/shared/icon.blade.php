<i
    {{ $attributes->merge([
        'class' => 'bi bi-' . $icon . ($append ? ' ml-1' : ($prepend ? ' mr-1' : '')),
    ]) }}></i>
