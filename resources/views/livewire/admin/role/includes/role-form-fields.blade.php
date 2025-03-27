@php
    $creating = $creating ?? false;
@endphp

<x-shared.form.field
    wire:model='{{ $formName }}.name'
    class="col-span-12"
    type="text"
    name="name"
    label="{{ trans_choice('words.n.name', 1) }}" :error="$errors->first($formName . '.name')" />

<x-shared.form.field
    wire:model='{{ $formName }}.admin_access'
    class="col-span-12"
    type="checkbox"
    name="admin_access"
    label="Admin access" :error="$errors->first($formName . '.admin_access')" />
