<x-app-layout>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="m-2 text-right">
            <x-button-link :href="route('event.create')" :active="request()->routeIs('events.index')">Создать турнир</x-button-link>
        </div>
 

        <div class="">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Мои турниры') }}
                </h2>
            </x-slot>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Изображение</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Название
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Дата
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Статус
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($events) == 0)
                            <p>No events</p>
                        @endif
                        @foreach ($events as $event)
                            <tr
                                class="bg-white border-b hover:bg-gray-50">
                              
                                    <td class="w-12 p-4">
                                        <img src="{{ asset('/logos/' . $event->logo) }}" alt="Logo">
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                        <a href="{{ route('event.organize', $event->id) }}" style="display:block">  {{ $event->title }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                        {{ $event->start_date }} - {{ $event->end_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $event->status }}
                                    </td>
                                </a>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
