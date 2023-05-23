<x-app-layout>
    <x-secondary-navigation :event='$event' />
    <div class=" max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if (Auth::user()->can('event-update', $event) && $event->status->value !== 'finished')
            @if ($event->visible)
                <div>
                    @livewire('unpublish-event', ['event' => $event])
                </div>
            @else
                <div>
                    @livewire('publish-event', ['event' => $event])
                </div>
            @endif

            @livewire('upload-logo', ['event' => $event])
        @endif
        <div class="flex flex-col md:flex-row lg:flex-row xl:flex-row bg-white">
            <img class="flex items-center h-48 mr-6 md:block lg:block xl:block"
                src="{{ $event->logo ? asset('logos/' . $event->logo) : asset('/img/no-image.png') }}" alt="" />
            <div class="m-6">
                <h5 class="text-xl font-semibold tracking-tight text-gray-700">{{ $event->title }}</h5>
                <div class="flex mt-2 gap-6">
                    <div>
                        <span>Начало события:</span>
                        <span class="mt-2.5 mb-5 text-sky-500">
                            {{ $event->start_date = $event->start_date ? \Carbon\Carbon::parse($event->start_date)->format('d F Y h:m') : null }}
                        </span>
                    </div>
                    <div>
                        <span>Конец события:</span>
                        <span class="mt-2.5 mb-5 text-sky-500">
                            {{ $event->end_date = $event->end_date ? \Carbon\Carbon::parse($event->end_date)->format('d F Y h:m') : null }}
                        </span>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="mt-2.5 mb-5 text-sky-500">
                        <div>
                            <span class="text-gray-500">Место проведения</span>
                        </div>
                        <span>{{ $event->location }}</span>
                    </div>
                    <div class="flex flex-col mt-2.5 mb-5 text-sky-500">
                        <span class="text-gray-500">Организатор</span>
                        <span>{{ $event->owner->name }}</span>
                    </div>
                    <div class="flex flex-col mt-2.5 mb-5 text-sky-500">
                        <span class="text-gray-500">Количество участников</span>
                        <span>{{ $event->checkedParticipants->count() }} из {{ $event->size }}</span>
                    </div>
                </div>
                <div class="flex mt-2.5 mb-2 text-sky-500">
                    <span class="text-gray-500">Статус</span>    
                </div>
                <div class="w-16 h-16 border border-gray-400 rounded-full">
                    <div class="font-semibold text-base flex justify-center items-center h-full">
                        {{ $event->status }}</div>
                </div>
                <div class="mt-12 mb-5">
                    <span class="text-gray-500">Детали события:</span>
                    <p>{{ $event->description }}</p>
                </div>
                @if (Auth::user()->can('event-update', $event) && $event->status->value !== 'finished')
                    <div class="flex items-center justify-between pt-2">
                        <x-button-link :href="route('settings.index', $event->id)" :active="request()->routeIs('event.show')">Настройки</x-button-link>
                    </div>
                @endif
            </div>
        </div>
</x-app-layout>
