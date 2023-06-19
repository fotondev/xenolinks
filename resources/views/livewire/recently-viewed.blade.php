<div wire:init="loadRecentlyViewed" class="recently-viewed">
    <ul class="max-w-md  divide-y divide-gray-200 dark:divide-gray-700">
        @forelse ($events as $event)
        <li>
            <a href="{{route('event.show', $event->id)}}">
                <x-event-shortlist :event="$event"  />
            </a>
        </li>
        @empty
        <div class="spinner mt-8"></div>
        @endforelse
    </ul>
</div>
