@php
    use App\Enums\EventStatus;
@endphp

<div>
    @if ($event->status == EventStatus::Setup)
        Ожидаем участников
    @elseif ($event->status == EventStatus::Pending)
        <x-button wire:loading.remove wire:target="createNextRound" wire:click="createNextRound">
            Начать турнир
        </x-button>
    @elseif($event->status == EventStatus::Launched)
        <div>Раунд {{ $currentRound->number }}</div>
        @if ($currentRound->number > 1)
            <x-button wire:click="showPreviousRound">Показать предыдущий</x-button>
        @endif
        @if (!$currentRound->is_finished)
            @if ($currentRound->number == $roundsAmount)
                <x-button wire:loading.remove wire:target="finishRound" wire:click="finishEvent">Закончить
                    турнир</x-button>
            @else
                <x-button wire:loading.remove wire:target="finishRound" wire:click="finishRound">Закончить
                    раунд</x-button>
            @endif
        @elseif($currentRound->number < $event->rounds->count())
            <x-button wire:click="showNextRound">Показать следующий</x-button>
        @else
            <x-button wire:click="createNextRound">Next round</x-button>
        @endif
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
    @elseif($event->status == EventStatus::Finished)
        Событие закончено!<br>
        @if (!count($event->participants))
            Нет участников
        @endif
        @foreach ($currentMatches as $i => $duel)
            <ul>
                <li>
                    {{ $i + 1 }}
                    {{ $duel->number }}
                    @foreach ($duel->participants as $participant)
                        <div>{{ $participant->name }}</div>
                    @endforeach
                </li>
            </ul>
        @endforeach
    @endif

    <span wire:loading wire:target="finishRound" class="inline-block px-4 my-3 font-bold text-red-700">Finishing</span>
    <span wire:loading wire:target="createNextRound" class="inline-block px-4 my-3 font-bold text-red-700">Starting</span>
</div>
