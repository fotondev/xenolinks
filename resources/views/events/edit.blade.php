
<x-app-layout>
    <x-form method="PUT" action="{{ route('events.index') }}" heading="Создание турнира">
        <x-form-group label="title" value="Название">
            <x-input placeholder="Введите название" id="title" name="title" />
            <x-input-error for="title" />
        </x-form-group>
        <x-form-group label="location" value="Место проведения">
            <x-input placeholder="Введите адрес" id="location" name="location" />
            <x-input-error for="location" />
        </x-form-group>
        <x-form-group label="size" value="Кол-во участников">
            <x-input type="number" placeholder="" id="size" name="size" />
            <x-input-error for="size" />
        </x-form-group>
        <x-form-group label="start_date" value="Старт турнира">
            <x-input type="datetime-local" placeholder="" id="start_date" name="start_date" />
            <x-input-error for="start_date" />
        </x-form-group>
        <x-form-group label="end_date" value="Окончание турнира">
            <x-input type="datetime-local" placeholder="" id="end_date" name="end_date" />
            <x-input-error for="end_date" />
        </x-form-group>
        <x-form-group label="description" value="Описание">
            <textarea type="datetime-local" placeholder="" id="description" name="description" class="w-full"></textarea>
            <x-input-error for="description" />
        </x-form-group>

        <div class="flex items-center justify-between">
            <x-button>
                Submit
            </x-button>
        </div>
    </x-form>
</x-app-layout>