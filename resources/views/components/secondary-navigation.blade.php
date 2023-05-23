@props(['event'])
<nav x-data="{ open: false }" class="border-b border-gray-800">
    <!-- Secondary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link  href="{{ route('event.show', $event->id) }}" :active="request()->routeIs('event.show', $event->id)">
                        {{ __('Информация') }}
                    </x-nav-link>
                </div>
                <div class=" space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('participants.index', $event->id) }}" :active="request()->routeIs('participants.index', $event->id)">
                        {{ __('Состав') }}
                    </x-nav-link>
                </div>
                <div class=" space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    {{-- @if ($event->status->value == 'finished') --}}
                    <x-nav-link href="{{ route('duels.index', $event->id) }}" :active="request()->routeIs('duels.index', $event->id)">
                        {{ __('Сражения') }}
                    </x-nav-link>
                    {{-- @else
                    <x-nav-link href="{{ route('duels', $event->id) }}" :active="request()->routeIs('duels', $event->id)">
                        {{ __('Сражения') }}
                    </x-nav-link>
                    @endif --}}
                </div>

            </div>
           
</nav>
