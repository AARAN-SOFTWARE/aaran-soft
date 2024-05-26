<div>
    <x-controls.lookup.model :show-model="$showModel" >
        <x-input.lookup-text wire:model.live="vname"  x-ref="vname" :label="'City'" :name="'vname'"/>
    </x-controls.lookup.model>
</div>
