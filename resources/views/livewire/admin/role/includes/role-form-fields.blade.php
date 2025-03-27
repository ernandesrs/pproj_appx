@php
    $creating = $creating ?? false;
@endphp

<x-shared.form.field
    wire:model='{{ $formName }}.name'
    class="col-span-12"
    type="text"
    label="{{ trans_choice('words.n.name', 1) }}" :error="$errors->first($formName . '.name')" />

<x-shared.form.field
    wire:model='{{ $formName }}.admin_access'
    class="col-span-12"
    type="checkbox"
    label="Admin access" :error="$errors->first($formName . '.admin_access')" />
