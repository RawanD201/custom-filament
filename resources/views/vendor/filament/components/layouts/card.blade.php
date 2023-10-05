@props([
    'title' => null,
    'width' => 'md',
])

<x-filament::layouts.base :title="$title">
    <div @class([
        'filament-login-page flex items-center justify-center min-h-screen bg-gray-100 text-gray-900 py-12',
        'dark:bg-gray-900 dark:text-white' => config('filament.dark_mode'),
    ])>
        <div @class([
            'w-screen px-6 -mt-16 space-y-8 md:mt-0 md:px-2',
            match ($width) {
                'xs' => 'max-w-xs',
                'sm' => 'max-w-sm',
                'md' => 'max-w-md',
                'lg' => 'max-w-lg',
                'xl' => 'max-w-xl',
                '2xl' => 'max-w-2xl',
                '3xl' => 'max-w-3xl',
                '4xl' => 'max-w-4xl',
                '5xl' => 'max-w-5xl',
                '6xl' => 'max-w-6xl',
                '7xl' => 'max-w-7xl',
                default => $width,
            },
        ])>
            <div @class([
                'p-8 space-y-4 bg-white/50 backdrop-blur-xl border border-gray-200 shadow-2xl rounded-2xl relative',
                'dark:bg-gray-900/50 dark:border-gray-700' => config('filament.dark_mode'),
            ])>
                <div class="flex justify-center w-full">
                    {{-- ! changed by RawanD201 --}}
                    {{-- <x-filament::brand /> --}}
                    <div class="flex flex-col items-center justify-center gap-5">
                        <img src="{{ asset('/img/logo-light.png') }}" alt="Logo" class="w-3/4">
                        <span class="capitalize font-bold text-xl">{{ __('labels.app.name') }}</span>
                    </div>


                </div>

                @if (filled($title))
                    <h2 class="text-xl font-bold tracking-tight text-center">
                        {{ $title }}
                    </h2>
                @endif

                <div {{ $attributes }}>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    @livewire('notifications')
</x-filament::layouts.base>
