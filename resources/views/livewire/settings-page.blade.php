<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <x-card-link :href="route('event.edit', $event->id)">
        <h2>
            Основные
        </h2>
    </x-card-link>
    <x-card-link :href="route('registration.settings', $event->id)">
        <h2>
            Регистрация
        </h2>
    </x-card-link>
    <x-card-link :href="route('participant.settings', $event->id)">
        <h2>
            Участники
        </h2>
    </x-card-link>
    <x-card-link>
        <h2>
            Управление правами
        </h2>
    </x-card-link>
    <x-card-link>
        <h2>
            Глобальные операции
        </h2>
    </x-card-link>
</div>
