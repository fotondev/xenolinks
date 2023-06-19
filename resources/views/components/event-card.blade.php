<div class="flex flex-col mt-8 p-4 w-full max-w-sm bg-secondary rounded-lg hover:scale-110">
    <div class="relative inline-block">
        <div>
            <a href="{{ route('event.show', $event->id) }}" >
                <img class="w-48 mr-6 md:block hover:opacity-75 transition ease-in-out duration-75"
                    src="{{ $event->logo ? asset('logos/' . $event->logo) : asset('/img/no-image.png') }}" alt="" />
                <h2 class="block text-xl font-semibold leading-tight hover:text-hover mt-8">
                    {{ $event->title }}
                </h2>
            </a>
        </div>
        <div class="px-5 pb-2">
            <div class="mt-1">
                {{ $event->start_date = $event->start_date ? \Carbon\Carbon::parse($event->start_date)->format('d F Y h:m') : null }}
            </div>
            <div class="flex items-center mt-2 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg>
                {{ $event->location }}
            </div>
            <div class="flex items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                {{ $event->owner->name }}
            </div>
            <div class="flex items-center mt-2">
                <x-participants-icon />
                {{ $event->checked_participants_count }} / {{ $event->size }}
            </div>
        </div>
    </div>
</div>
