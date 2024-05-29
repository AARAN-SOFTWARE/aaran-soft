@props([
    'height'=>'h-64',
    'placeholder'
])
<div>
{{--    <div x-data="{ description : @entangle('description').defer }"--}}
{{--         class="prose w-full"--}}
{{--         x-init='--}}
{{--        $nextTick(() => {--}}
{{--            let editor = new SimpleMDE({--}}
{{--                element: $refs.editor,--}}
{{--                initialValue: description--}}
{{--             });--}}
{{--             editor.codemirror.on("change", function(){--}}
{{--                description = editor.value()--}}
{{--            })--}}
{{--        })--}}
{{--    '>--}}
{{--        <form >--}}
{{--            <input type="text" name="title" wire:model.defer="title" >--}}
{{--            <textarea x-ref="editor" x-model="description" class=""></textarea>--}}
{{--            <button wire:submit.prevent="save" type="submit">see changes</button>--}}
{{--        </form>--}}
{{--    </div>--}}

    <div
        wire:ignore.self
        wire:model="mdCode"
        x-data="{ description : @entangle('description').defer,
        init() {
            let editor = new SimpleMDE({ element: this.$refs.editor })

            editor.value(this.value)

            editor.codemirror.on('change', () => {
                this.value = editor.value()
            })
        },
    }"
        class="prose w-full"
    >
        <textarea x-ref="editor" placeholder="{{$placeholder}}" class="he"></textarea>
    </div>
</div>
