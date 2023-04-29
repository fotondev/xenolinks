<div class="flex p-4 w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
    <a href="#">
        <img class="p-8 rounded-t-lg" src="/docs/images/products/apple-watch.png" alt="event image" />
    </a>
    <div class="px-5 pb-5">
        <a href="#">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900">{{ $event->title }}</h5>
        </a>
        <div class="flex items-center mt-2.5 mb-5 text-sky-500">
            {{ $event->status }}
        </div>
        <div class="flex items-center justify-between pt-2">
            <x-button-link :href="route('settings.index', $event->id)" :active="request()->routeIs('event.show')">Настройки</x-button-link>
        </div>
    </div>
</div>
