<div>
    @if ($event->enable_reg || request()->routeIs('registration.settings'))
        <div class="text-black-500 border-2 border-gray-200 p-10 rounded max-w-lg mx-auto mt-6 mb-4">
            <form class="text-black-500" wire:submit.prevent="setRegistration" method="PUT">
                @csrf
                <div class="mb-1">
                    <x-label for="openReg" class="inline-block text-lg mb-2">
                        Начало регистрации
                    </x-label>
                    <x-input  wire:model.defer="openReg" type="datetime-local"
                        class="border border-gray-200 rounded p-2 w-full" name="openReg" value="{{ old('openReg') }}" />
                    @error('openReg')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <x-label for="closeReg" class="inline-block text-lg mb-2">
                        Закрытие регистрации
                    </x-label>
                    <x-input  wire:model.defer="closeReg" type="datetime-local"
                        class="border border-gray-200 rounded p-2 w-full" name="closeReg"
                        value="{{ old('closeReg') }}" />
                    @error('closeReg')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-1">
                    <h3 class="mb-2">Открыть доступ к регистрации?</h3>
                    <div>
                        <label for="yes">
                            <input type="radio" wire.model="enableReg" id="yes" name="enableReg"
                                value="1">
                            Да
                        </label>
                    </div>
                    <div>
                        <label for="no">
                            <input type="radio" wire.model="enableReg" id="no" name="enableReg"
                                value="0" checked>
                            Нет
                        </label>
                    </div>
                </div>
                <x-button class="mt-2">
                    {{ __('Подтвердить') }}
                </x-button>
            </form>
        </div>
    @else
        <div>
            <div class="max-w-lg mx-auto space-x-8">
                <div class="flex flex-row space-x-8">
                    <p>Закрытие</p>
                    <p>{{ $event->close_reg_date }}</p>
                </div>
            </div>
            <div>
                <x-button>Список регистраций</x-button>
            </div>
        </div>
    @endif
</div>
