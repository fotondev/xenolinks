<x-app-layout>
<form action="{{route('duel.update', [$event->id, $duel->id])}}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <x-input id="p1_score" name="p1_score" type="number" value="{{old('p1_score', $duel->p1_score)}}"></x-input>
        <label for="p1_score">Участник 1 очки:</label>
    </div>
    <div>
        <x-input id="p2_score" name="p2_score" type="number" value="{{old('p2_score', $duel->p2_score)}}"></x-input>
        <label for="p2_score">Участник 2 очки:</label>
    </div>
    <x-button type="submit">Подтвердить</x-button>

</form>    
</x-app-layout>