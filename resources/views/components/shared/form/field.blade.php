@php
    $baseClass = implode(' ', [
        'duration-100',

        'bg-zinc-100 focus:bg-white dark:bg-zinc-900 dark:focus:bg-zinc-800 disabled:bg-zinc-200 dark:disabled:bg-zinc-600',

        !in_array($type, ['checkbox', 'radio'])
            ? 'w-full ' . ($small ? 'h-[35px] text-sm' : 'h-[45px]')
            : 'w-[24px] h-[24px] ' . ($type == 'checkbox' ? '' : 'rounded-full'),

        'border focus:border-zinc-400 outline-none dark:focus:border-zinc-700 px-5' . ($square ? '' : ' rounded-xl'),

        // border/text
        empty($error)
            ? 'border-zinc-300 dark:border-zinc-800'
            : 'border-danger text-danger dark:border-danger-dark dark:text-danger-dark',
    ]);
@endphp

<div
    x-data="{
        name: '{{ $name }}',
        fileName: 'Nenhum arquivo',

        selectFile(event) {
            var file = $refs[this.name];
            if (file) {
                file.click();
            }
        },

        selectedFile(event) {
            this.fileName = event.target.files.length + ' arquivo(s) selecionado(s).';
        }
    }"
    {{ $attributes->only(['class'])->merge(['class' => '']) }}>
    @if (in_array($type, ['text', 'email', 'password', 'number', 'date', 'checkbox', 'radio', 'file']))
        @if ($type == 'file')
            <div
                {{ $attributes->except(['class'])->merge([
                    'class' => $baseClass . ' !px-0 flex items-center overflow-hidden',
                ]) }}>
                <span class="bg-zinc-200 dark:bg-zinc-800 h-full px-5 flex items-center">Escolher</span>
                <span
                    x-text="fileName"
                    x-on:click="selectFile"
                    class="flex-1 h-full px-5 flex items-center cursor-pointer whitespace-nowrap truncate"></span>
            </div>
            <input x-on:change="selectedFile" x-ref="{{ $name }}" type="file" name="{{ $name }}"
                id="{{ $name }}"
                class="hidden" />
        @else
            <input
                {{ $attributes->merge([
                    'class' => $baseClass,
                    'type' => $type,
                    'name' => $name,
                    'id' => $name,
                ]) }} />
        @endif
    @elseif($type == 'select')
        <select
            {{ $attributes->merge([
                'class' => $baseClass,
                'type' => $type,
                'name' => $name,
                'id' => $name,
            ]) }}>
            <option value="none">Selecione</option>
            @foreach ($options as $option)
                <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
            @endforeach
        </select>
    @elseif($type == 'textarea')
        <textarea
            {{ $attributes->except(['value', 'type'])->merge([
                'class' => $baseClass . ' min-h-[80px] py-3',
                'name' => $name,
                'id' => $name,
            ]) }}>{{ $attributes->get('value') }}</textarea>
    @endif

</div>
