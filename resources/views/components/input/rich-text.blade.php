@props([
    'height'=>'h-64',
    'placeholder'
])
<link rel="stylesheet" href="https://unpkg.com/trix@2.0.0-alpha.1/dist/trix.css"></link>
<script src="https://unpkg.com/trix@2.0.0-alpha.1/dist/trix.umd.js"></script>
<style>[data-trix-button-group="file-tools"] { display: none !important; }</style>

<div
    wire:ignore.self
    x-data="{
        value: @entangle($attributes->wire('model')),
        isFocused() { return document.activeElement !== this.$refs.trix },
        setValue() { this.$refs.trix.editor.loadHTML(this.value) }
    }"
    x-init="setValue(); $watch('value', () => isFocused() && setValue())"
    x-on:trix-change="value = $event.target.value"
    {{ $attributes->whereDoesntStartWith('wire:model') }}
    x-id="['trix']"
    class="max-w-2xl w-full"
    @trix-change="value = $refs.input.value"
    @trix-file-accept.prevent
>
    <input :id="$id('trix')" type="hidden" x-ref="input" class="">

    <!-- Optional .prose class added to utilize Tailwind's Typography Plugin for styling -->
    <trix-editor x-ref="trix" :input="$id('trix')" placeholder="{{$placeholder}}" class="prose {{$height}} bg-white overflow-y-scroll"></trix-editor>
</div>



{{--<div--}}
{{--    wire:ignore.self--}}
{{--    class="rounded-md shadow-sm"--}}
{{--    x-data="{--}}
{{--        value: @entangle($attributes->wire('model')),--}}
{{--        isFocused() { return document.activeElement !== this.$refs.trix },--}}
{{--        setValue() { this.$refs.trix.editor.loadHTML(this.value) }--}}
{{--    }"--}}
{{--    x-init="setValue(); $watch('value', () => isFocused() && setValue())"--}}
{{--    x-on:trix-change="value = $event.target.value"--}}
{{--    {{ $attributes->whereDoesntStartWith('wire:model') }}--}}

{{-->--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"/>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>--}}
{{--    <input id="x" class="hidden">--}}
{{--    <trix-editor x-ref="trix" input="x" placeholder="{{$placeholder}}"--}}
{{--                 class="overflow-auto text-ellipsis form-textarea block w-full text--}}
{{--                    rounded-lg appearance-none border-2 {{$height}}--}}
{{--                    border-gray-200 py-2 px-3 bg-white text-zinc-700--}}
{{--                    placeholder-gray-400 text-base focus:outline-none--}}
{{--                    focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-150 ease-in-out"></trix-editor>--}}
{{--</div>--}}


{{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/1.11/simplemde.min.css">--}}
{{--<script src="https://cdn.jsdelivr.net/simplemde/1.11/simplemde.min.js"></script>--}}

{{--<div--}}
{{--    x-data="{--}}
{{--        value: '# Write Some Markdown...',--}}
{{--        init() {--}}
{{--            let editor = new SimpleMDE({ element: this.$refs.editor })--}}

{{--            editor.value(this.value)--}}

{{--            editor.codemirror.on('change', () => {--}}
{{--                this.value = editor.value()--}}
{{--            })--}}
{{--        },--}}
{{--    }"--}}
{{--    class="prose w-full"--}}
{{-->--}}
{{--    <textarea x-ref="editor"></textarea>--}}
{{--</div>--}}
