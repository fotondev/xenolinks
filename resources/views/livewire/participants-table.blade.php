<div>
    <div x-cloak x-data="{ show: false }">
        <x-button @click="show = !show">
            <span x-text="show ? '{{ __('Скрыть фильтр') }}' : '{{ __('Показать фильтр') }}'"></span>
        </x-button>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4 bg-white" x-show="show" x-transition>
            <form action="">
                <div class="flex flex-col mt-4">
                    <x-label for="search" value="{{ __('Поиск') }}" />
                    <x-input wire:model="search" id="search" class="block mt-1 w-full" type="text"
                        name="search" />
                </div>
                <div class="flex flex-col">
                    <x-label>Статус</x-label>
                    <div class="flex pt-2 pb-4 gap-4">
                        <div class="flex gap-2">
                            <x-input wire:model="status" type="radio" id="all" name="status" value="all"
                                checked></x-input>
                            <x-label for="all">Все</x-label>

                        </div>
                        <div class="flex gap-2">
                            <x-input wire:model="status" type="radio" id="checked" name="status" value="1">
                            </x-input>
                            <x-label for="checked">Подтвержден</x-label>

                        </div>
                        <div class="flex gap-2">
                            <x-input wire:model="status" type="radio" id="not-checked" name="status" value="0">
                            </x-input>
                            <x-label for="not-checked">На проверке</x-label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg pt-4">

        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col">
                        <div class="flex items-center"><button wire:click="sortBy('name')"
                                class="px-6 py-3">Имя</button>
                            <x-sort-icon $field="name" :sortField="$sortField" :sortAsc="$sortAsc" />
                        </div>
                    </th>
                    @can('event-update', $event)
                        <th scope="col">
                            <button class="px-6 py-3">Email</button>
                        </th>
                        <th scope="col">
                            <div class="flex items-center"><button wire:click="sortBy('created_at')"
                                    class="px-6 py-3">Добавлен</button>
                                <x-sort-icon $field="created_at" :sortField="$sortField" :sortAsc="$sortAsc" />
                            </div>
                        </th>
                    @endcan

                    <th scope="col">
                        <div class="flex items-center"><button wire:click="sortBy('created_at')"
                                class="px-6 py-3">Статус</button>
                            <x-sort-icon $field="created_at" :sortField="$sortField" :sortAsc="$sortAsc" />
                        </div>
                    </th>
                    @can('event-update', $event)
                        <th scope="col"></th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @if (count($participants) == 0)
                    <tr>
                        <td>
                            <p>No participants</p>
                        </td>
                    </tr>
                @endif
                @foreach ($participants as $participant)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-semibold text-gray-900">
                            {{ $participant->name }}
                        </td>
                        @can('event-update', $event)
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {{ $participant->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $participant->created_at }}
                            </td>
                        @endcan
                        <td class="px-10 py-4">
                            @livewire('participant-status', ['participant' => $participant, 'field' => 'is_checked'], key($participant->id))
                        </td>
                        @if (Auth::user()->can('event-update', $event) && $event->status->value !== 'finished')
                            <td class="px-6 py-4">
                                <div>
                                    <ul class="flex gap-2">
                                        <li>
                                            <a href="{{ route('participant.edit', [$event->id, $participant->id]) }}">
                                                <x-button> Edit</x-button>
                                            </a>
                                        </li>
                                        <li>
                                            <x-button class="bg-red-500" wire:click="delete({{ $participant->id }})">
                                                Delete</x-button>
                                        </li>
                                    </ul>
                                </div>
                                {{-- <div x-data="{ open: false }">
                                    <button @click="open = true">
                                        <x-settings-icon />
                                    </button>
                                    <div class="absolute bottom-0 bg-sky-300" x-show="open" @click.outside="open = false">
                                        <ul class="flex">

                                            <li>
                                                <a href="{{ route('participant.edit', [$event->id, $participant->id]) }}">
                                                    <x-button> Edit</x-button>
                                                </a>
                                            </li>
                                            <li>
                                                <button wire:click="delete({{ $participant->id }})">Delete</button>
                                            </li>
                                        </ul>
                                    </div>

                                </div> --}}
                            </td>
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        {{ $participants->links() }}
    </div>
</div>
