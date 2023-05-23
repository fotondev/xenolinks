<div>
    <div class="text-black-500 border-2 border-gray-200 p-10 rounded max-w-lg mx-auto mt-6 mb-4">
        <form class="text-black-500" wire:submit.prevent="setCheckIn">
            @csrf
            <div class="mb-1">
                <x-label for="openReg" class="inline-block text-lg mb-2">
                    Начало проверки
                </x-label>
                <x-input  wire:model.defer="openCheckIn" type="datetime-local"
                    class="border border-gray-200 rounded p-2 w-full" name="openCheckIn" value="{{ old('openCheckIn') }}" />
                @error('openCheckIn')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <x-label for="closeCheckIn" class="inline-block text-lg mb-2">
                    Закрытие проверки
                </x-label>
                <x-input  wire:model.defer="closeCheckIn" type="datetime-local"
                    class="border border-gray-200 rounded p-2 w-full" name="closeCheckIn"
                    value="{{ old('closeCheckIn') }}" />
                @error('closeCheckIn')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <x-button class="mt-2">
                {{ __('Подтвердить') }}
            </x-button>
        </form>
    </div>
</div>
