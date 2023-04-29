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
                    <div class="mb-6">
                        <x-label for="title" class="inline-block text-lg mb-2">Название</x-label>
                        <input type="text"
                            class="@error('title')border border-red-500 @enderror
                        border border-gray-200 rounded p-2 w-full"
                            name="title" value="{{ old('title') }}" />
                        @error('title')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <x-label for="location" class="inline-block text-lg mb-2">Место проведения</x-label>
                        <input type="text"
                            class="@error('location')border border-red-500 @enderror border border-gray-200 rounded p-2 w-full"
                            name="location" value="{{ old('location') }}" />
                        @error('location')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <x-label for="size" class="inline-block text-lg mb-2 ">Кол-во участников</x-label>
                        <input type="number"
                            class="@error('size')border border-red-500 @enderror
                        border border-gray-200 rounded p-2 w-full"
                            name="size" value="{{ old('size') }}" />
                        @error('size')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="mb-6">
                        <x-label class="inline-block text-lg mb-2">Уровень подготовки участников</x-label>
                        <div class="flex items-center p-2 border-gray-200 rounded">
                            <input id="level-1" type="radio" value="casual" name="level"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <x-label for="level-1"
                                class="w-full py-4 m-2 text-sm font-medium text-gray-900">
                                Любительский</x-label>
                            <input checked id="level-2" type="radio" value="expert" name="level"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <x-label for="level-2"
                                class="w-full py-4 ml-2 text-sm font-medium text-gray-900">
                                Экспертный</x-label>
                        </div>
                        @error('level')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="pt-2">
                        @if ($event->logo)
                            <div class="flex">
                                <img src="{{ Storage::url($event->logo) }}" alt="logo" class="w-48 mr-6 md:block" />
                                <div class="flex gap-2">
                                    <x-label for="erase">Стереть лого</x-label>
                                    <x-checkbox id="erase" name="erase" value="1"></x-checkbox>
                                </div>
                            </div>
                        @else
                            <img src="{{ asset('/img/no-image.png') }}" alt="logo" class="w-48 mr-6 md:block" />
                        @endif
                        <x-label for="logo" class="@error('size')border border-red-500 @enderror border border-gray-500">Выбрать лого</x-label>
                        <span class="text-gray-700">(256x256px minimum resolution, PNG or JPG.)</span>
                        <x-input type="file" id="logo" name="logo" class="hidden"  />       
                    </div> --}}
                </div>
            </div>
            <div>
                <div class="mb-6">
                    <x-label for="description" class="inline-block text-lg mb-2">
                        Описание
                    </x-label>
                    <textarea class="@error('description')border border-red-500 @enderror border border-gray-200 rounded p-2 w-full"
                        name="description" rows="3" placeholder="Опишите турнир " value="{{ old('description') }}"></textarea>
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
                        name="startDate" value="{{ old('start_date') }}" />
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
                        name="endDate" value="{{ old('end_date') }}" />
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
