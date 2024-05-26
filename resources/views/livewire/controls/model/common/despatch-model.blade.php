<div>
    <x-controls.lookup.model :show-model="$showModel" >
        <x-input.lookup-text wire:model.live="vname"  x-ref="vname" :label="'Despatch NO'" :name="'vname'"/>
        <x-input.lookup-date wire:model.live="vdate"  x-ref="date" :label="'Despatch Date'" :name="'vdate'"/>
    </x-controls.lookup.model>
</div>
