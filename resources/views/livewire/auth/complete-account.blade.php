<form class="space-y-8" wire:submit.prevent="completeAccount">
    @error('error')
        <div>
            <span class="text-danger-500">
                {{ $message }}
            </span>
        </div>
    @enderror

    {{ $this->form }}

    <x-filament::button
        class="w-full filament-button filament-button-size-md inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset dark:focus:ring-offset-0 min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700 "
        form="completeAccount" type="submit">
        {{ __('auth.complete_action') }}
    </x-filament::button>

    <x-filament::hr />

    <x-filament::button class="w-full" wire:click="showLoginPage" color="secondary">
        {{ __('filament::login.buttons.submit.label') }}
    </x-filament::button>
</form>
