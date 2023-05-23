<x-app-layout>
    <div class="border-2 border-gray-200 p-10 rounded max-w-fit mx-auto mt-12">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Настройки') }}
            </h2>
        </x-slot>
        <form action="{{ route('event.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex justify-content space-x-10">

                <div>
                    <x-input.group label="Название" for="title" :error="$errors->first('title')">
                        <x-input.text id="title" name="title" value="{{ old('title', $event->title) }}" />
                    </x-input.group>

                    <x-input.group label="Место проведения" for="location" :error="$errors->first('location')">
                        <x-input.text id="location" name="location" value="{{ old('location', $event->location) }}" />
                    </x-input.group>

                    <x-input.group label="Кол-во участников " for="size" :error="$errors->first('size')">
                        <x-input.text type="number" id="size" name="size"
                            value="{{ old('size', $event->size) }}" />
                    </x-input.group>

                </div>
                <div>
                    <x-input.group inline="true" label="Уровень подготовки участников " for="level"
                        :error="$errors->first('level')">
                        <div class="flex">
                            <x-input.radio id="level-1" value="{{ old('level', $event->level) }}" name="level" />
                            <x-label for="level-1" class="w-full py-4 m-2 text-sm font-medium text-gray-900">
                                Любительский</x-label>
                        </div>
                        <div class="flex">
                            <x-input.radio id="level-2" value="{{ old('level', $event->level) }}" name="level" />
                            <x-label for="level-2" class="w-full py-4 m-2 text-sm font-medium text-gray-900">
                                Экспертный</x-label>
                        </div>
                    </x-input.group>
                </div>
            </div>
            <div>
                <div class="mb-6">
                    <x-label for="description" class="inline-block text-lg mb-2">
                        Описание
                    </x-label>
                    <textarea class="@error('description')border border-red-500 @enderror border border-gray-200 rounded p-2 w-full"
                        name="description" rows="3" placeholder="Опишите турнир "
                        value="{{ old('description', $event->description) }}"></textarea>
                    @error('description')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-1">
                    <x-label for="start_date" class="inline-block text-lg mb-2">
                        Дата начала события
                    </x-label>
                    <input wire:model.defer="startDate" type="datetime-local"
                        class=" @error('start_date')border border-red-500 @enderror border border-gray-200 rounded p-2 w-full"
                        name="startDate" value="{{ old('start_date', $event->end_date) }}" />
                    @error('start_date')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-1">
                    <x-label for="end_date" class="inline-block text-lg mb-2">
                        Дата окончания события
                    </x-label>
                    <input wire:model.defer="endDate" type="datetime-local"
                        class=" @error('end_date')border border-red-500 @enderror border border-gray-200 rounded p-2 w-full"
                        name="endDate" value="{{ old('end_date', $event->end_date) }}" />
                    @error('end_date')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-8">
                    <x-button>Обновить</x-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
