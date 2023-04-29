<x-app-layout>
    <x-secondary-navigation :event='$event' />
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Участники') }}
                </h2>
            </x-slot>
        </div>

        <div>
            <a href="{{ route('participant.create', $event->id) }}">
                <x-button>Добавить</x-button>
            </a>
            @livewire('participants-count', [
                'event' => $event,
                'checked' => $checked,
            ])
        </div>
        <div>
            @livewire('participants-table', [
                'event' => $event,
            ])
        </div>
    </div>
</x-app-layout>
