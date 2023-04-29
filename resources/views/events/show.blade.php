<x-app-layout>
    <x-secondary-navigation :event='$event' />
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $event->title }}
            </h2>
        </x-slot>
        @if ($event->visible)
            <div>
                @livewire('unpublish-event', ['event' => $event])
            </div>
        @else
            <style>
                [x-cloak] {
                    display: none
                }
            </style>
            <div x-cloak x-data="{ open: false }">
                <x-button @click="open = true">Опубликовать</x-button>
                <div x-show="open" @click.outside="open = false">
                    @livewire('publish-event', ['event' => $event])
                </div>
            </div>
        @endif
        <a href="#">
            <img class="p-8 rounded-t-lg" src="/docs/images/products/apple-watch.png" alt="event image" />
        </a>
        <div class="p-4 bg-white">
            <a href="#">
                <h5 class="text-xl font-semibold tracking-tight text-gray-900">{{ $event->title }}</h5>
            </a>
            <div class="flex gap-6">
                <div>
                    <p>Начало события</p>
                    {{ $event->start_date }}
                </div>
                <div>
                    <p>Конец события</p>
                    {{ $event->end_date }}
                </div>

            </div>
            <div class="flex flex-col">
                <div class="mt-2.5 mb-5 text-sky-500">
                    <p class="text-gray-500">Место проведения</p>
                    {{ $event->location }}
                </div>
                <div class="mt-2.5 mb-5 text-sky-500">
                    <p class="text-gray-500">Организатор</p>
                    {{ $event->owner->name }}
                </div>
                <div class="mt-2.5 mb-5 text-sky-500">
                    <p class="text-gray-500">Количество участников</p>
                    <p>{{ count($event->participants) }} из {{ $event->size }}</p>
                </div>
            </div>
            <div class="mt-2.5 mb-5 text-sky-500">
                <p class="text-gray-500">Статус</p>
                {{ $event->status }}
            </div>
            <div class="mt-2.5 mb-5 text-sky-500">
                <p class="text-gray-500">Детали события:</p>
                {{ $event->description }}
            </div>
            <div class="flex items-center justify-between pt-2">
                <x-button-link :href="route('settings.index', $event->id)" :active="request()->routeIs('event.show')">Настройки</x-button-link>
            </div>
        </div>
</x-app-layout>
