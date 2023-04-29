<div class="relative z-10">
    <div class="text-black-500 border-2 border-gray-200 p-2 rounded max-w-lg mx-auto mt-8">
        <form wire:submit.prevent="publish" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-1">
                <x-label for="start_date" class="inline-block text-lg mb-2">
                    Дата начала события
                </x-label>
                <input wire:model.defer="startDate" type="datetime-local"
                    class="border border-gray-200 rounded p-2 w-full" name="startDate" value="{{ old('startDate') }}" />
                @error('startDate')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-1">
                <x-label for="end_date" class="inline-block text-lg mb-2">
                    Дата окончания события
                </x-label>
                <input wire:model.defer="endDate" type="datetime-local"
                    class="border border-gray-200 rounded p-2 w-full" name="endDate" value="{{ old('endDate') }}" />
                @error('endDate')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <x-button class="mt-2">
                {{ __('Добавить') }}
            </x-button>
        </form>
    </div>

</div>
