<div>
    @if ($logo)
        <img src="{{ $logo->temporaryUrl() }}" alt="temp" class="w-48 mr-6 md:block">
    @elseif ($event->logo)
        <img src="{{ Storage::url($event->logo) }}" alt="logo" class="w-48 mr-6 md:block" />
    @endif
    <div class="flex flex-col pt-2">
        <div class="pb-2">
            <form wire:submit.prevent="uploadLogo" method="POST" action="{{ route('logo.update', $event->id) }}">
                @csrf
                @method('PUT')
                <x-label for="logo" class="@error('size')border border-red-500 @enderror">Выбрать</x-label>
                <x-input wire:model="logo" type="file" id="logo" name="logo" class="hidden" />
                <div class="flex gap-2">
                    <x-label for="erase">Стереть лого</x-label>
                    <x-checkbox id="erase"></x-checkbox>
                </div>
                @if ($logo)
                    <x-button class="mt-4">
                        {{ __('Обновить логотип') }}
                    </x-button>
                @endif
            </form>
        </div>
    </div>
</div>
