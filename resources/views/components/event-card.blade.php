<div class="flex flex-col mt-8 p-4 w-full max-w-sm bg-white border  rounded-lg shadow hover:border-sky-500">
    <div class="relative inline-block">
        <a href="{{ route('event.show', $event->id) }}">
            <img class="w-48 mr-6 md:block hover:opacity-75 transition ease-in-out duration-75"
                src="{{ $event->logo ? asset('logos/' . $event->logo) : asset('/img/no-image.png') }}" alt="" />
        </a>
        <div class="px-5 pb-2">
            <a href="{{ route('event.show', $event->id) }} " class="block text-xl font-semibold leading-tight text-gray-700 hover:text-gray-400 mt-8">
                {{ $event->title }}
            </a>
            <div class="text-sky-500 hover:text-sky-700 mt-1">
                {{ $event->start_date = $event->start_date ? \Carbon\Carbon::parse($event->start_date)->format('d F Y h:m') : null }}
            </div>
            <div class="flex items-center mt-2 text-sky-500 hover:text-sky-700 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg> 
                {{ $event->location }}
            </div>
            <div class="flex items-center mt-2 text-sky-500 hover:text-sky-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                {{ $event->owner->name }}
            </div>
            <div class="flex items-center mt-2 text-sky-500 hover:text-sky-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                </svg>
                {{ $event->checkedParticipants->count() }} / {{ $event->size }}
            </div>
        </div>
    </div>
</div>
