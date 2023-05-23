<x-app-layout>
    <div class="border-2 border-sky-300 p-6 rounded max-w-lg mx-auto mt-12">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-4 text-sky-500">
                Создать новый турнир
            </h2>
        </header>
        <form action="{{ route('events.index') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                            placeholder="Example: Remote, Boston MA, etc" value="{{ old('location') }}" />
                        @error('location')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <x-label for="size" class="inline-block text-lg mb-2">Кол-во участников</x-label>
                        <input type="number" min="0"
                            class="@error('size')border border-red-500 @enderror
                        border border-gray-200 rounded p-2 w-full"
                            name="size" value="{{ old('title') }}" />
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
                            <x-label for="level-1" class="w-full py-4 ml-2 text-sm font-medium text-gray-900">
                                Любительский</x-label>
                            <input checked id="level-2" type="radio" value="expert" name="level"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <x-label for="level-2" class="w-full py-4 ml-2 text-sm font-medium text-gray-900">
                                Экспертный</x-label>
                        </div>
                        @error('level')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <x-label for="description" class="inline-block text-lg mb-2">
                            Описание
                        </x-label>
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="3"
                            placeholder="Опишите турнир " value="{{ old('description') }}"></textarea>
                        @error('description')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <x-button>Создать</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
