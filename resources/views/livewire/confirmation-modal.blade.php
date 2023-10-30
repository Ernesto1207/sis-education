<div>
    <x-success-button wire:click="createRole" wire:loading.attr="disabled">
        {{ __('Crear Nuevo Rol') }}
    </x-success-button>
    <x-dialog-modal>
        <x-slot name="title">
            {{ __('Delete Account') }}
        </x-slot>
        <x-slot name="content">
            {{ __('content Account') }}
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingRoleCreate')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="createRole" wire:loading.attr="disabled">
                {{ __('Delete Account') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

</div>
