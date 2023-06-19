<div>
    <form wire:submit.prevent="uploadLogo" enctype="multipart/form-data">
        <x-input.group label="" for="logo" :error="$errors->first('logo')">
            <x-input.logo wire:model.defer="logo" id="logo">
                <span class="h-max rounded-full overflow-hidden bg-gray-100">

                    <img
                        src="{{ $logoPreview ? $logoPreview : ($event->logo ? asset('/logos/' . $event->logo) : null) }}">

                </span>
            </x-input.logo>
        </x-input.group>
        <span class="inline-flex rounded-md shadow-sm">
            <x-button>
                Сохранить
            </x-button>
        </span>
    </form>
</div>
