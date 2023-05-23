<x-app-layout>
    <x-secondary-navigation :event='$event' />
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Сражения') }}
                </h2>
            </x-slot>
        </div>
        <x-alert />
        <div>
            @livewire('duels-table', ['event' => $event])
        </div>
</x-app-layout>
