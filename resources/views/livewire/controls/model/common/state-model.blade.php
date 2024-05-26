<div>
    <x-controls.lookup.model :show-model="$showModel" >
        <x-input.lookup-text wire:model.live="vname"  x-ref="vname" :label="'State'" :name="'vname'"/>
        <x-input.lookup-text wire:model.live="state_code"  x-ref="state_code" :label="'State-Code'" :name="'state_code'"/>
    </x-controls.lookup.model>
</div>
