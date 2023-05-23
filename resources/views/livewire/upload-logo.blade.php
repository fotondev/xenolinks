<div>
    <form wire:submit.prevent="uploadLogo" enctype="multipart/form-data">
        <x-input.group label="" for="logo" :error="$errors->first('logo')">
            <x-input.logo wire:model.defer="logo" id="logo">
                <span class="h-32 w-32 rounded-full overflow-hidden bg-gray-100">
                    @if ($logo)
                        <span>{{ $logo->temporaryUrl() }}</span>
                    @elseif($event->logo)
                        <img src="{{ asset('/logos/' . $event->logo) }}">
                    @else
                       ауцауцацуац
                    @endif
                </span>
            </x-input.logo>
        </x-input.group>
        <span class="inline-flex rounded-md shadow-sm">
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Сохранить
            </button>
        </span>
    </form>
</div>
