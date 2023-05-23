<div>
    <div x-data="{ open: false }">
        <button @click="open = true">
            <x-settings-icon />
        </button>
        <div class="absolute bottom-0 bg-sky-300" x-show="open" @click.outside="open = false">
            <ul class="flex">

                <li>
                    <a href="{{ route('participant.edit', [$event->id, $participant->id]) }}">
                        <x-button> Edit</x-button>
                    </a>
                </li>
                <li>
                    <button wire:click="delete({{ $participant->id }})">Delete</button>
                </li>
            </ul>
        </div>

    </div>
</div>
