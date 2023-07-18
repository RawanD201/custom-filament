<form class="space-y-8" wire:submit.prevent="authenticate">

    @error('error')
        <div>
            <span class="text-danger-500">
                {{ $message }}
            </span>
        </div>
    @enderror

    {{ $this->form }}

    <x-filament::button class="w-full" form="authenticate" type="submit">
        {{ __('filament::login.buttons.submit.label') }}
    </x-filament::button>

    <x-filament::hr />

    <x-filament::button class="w-full" wire:click="showCompleteAccountPage" color="secondary">
        {{ __('auth.new_account') }}
    </x-filament::button>
</form>
