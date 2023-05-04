<div>
    <x-secondary-navigation :event='$event' />
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Сражения') }}
                </h2>
            </x-slot>
        </div>
        <x-alert />
        <div>
            <x-button  wire:click="showPreviousRound">Показать предыдущий</x-button>
            <div>
                @if ($currentRound)
                    <div>Раунд {{ $currentRound->number }}</div>
                    @if ($currentRound->is_finished)
                        <x-button wire:click="createNextRound">Next round</x-button>
                    @else
                        <x-button wire:loading.remove wire:target="finishRound" wire:click="finishRound">Finish</x-button>
                    @endif
                @else
                    <div>Раунд 0</div>
                    <x-button wire:loading.remove wire:target="createNextRound" wire:click="createNextRound">
                        Начать турнир
                    </x-button>
                @endif
                <span wire:loading wire:target="finishRound"
                    class="inline-block px-4 my-3 font-bold text-red-700">Finishing</span>
                <span wire:loading wire:target="createNextRound"
                    class="inline-block px-4 my-3 font-bold text-red-700">Starting</span>
            </div>

        </div>

        <div>
            @foreach ($currentMatches as $i => $duel)
                <a href="{{ route('duel.edit', [$event->id, $duel->id]) }}" class="border border-gray-500">
                    <div>Стол {{ $duel->number }}</div>
                    @foreach ($duel->participants as $participant)
                        <div>{{ $participant->name }}</div>
                    @endforeach
                </a>
            @endforeach

        </div>
    </div>
</div>

