<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Все турниры') }}
        </h2>
    </x-slot>
    <div class="flex items-center justify-center">
        <div class="mx-4">
            <h2 class="font-bold mb-2" >Последние просмотренные</h2>
            @livewire('recently-viewed')
        </div>
        <div class="mx-4">
            <h2 class="font-bold mb-2" >Самые популярные</h2>
            @livewire('most-popular-events')
        </div>
    </div>

    <div class="container mx-auto px-4">
        <div class="text sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 border-gray-800 pb-16 ">
            @foreach ($events as $event)
                <x-event-card :event="$event" />
            @endforeach
        </div>
    </div>

</x-app-layout>
