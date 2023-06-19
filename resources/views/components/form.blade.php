@props([
    'method' => 'POST',
    'action' => '',
    'heading'
])

<div class="flex flex-col justify-content bg-secondary rounded-lg p-6 max-w-lg mx-auto mt-12">
    <h2 class="text-2xl text-center font-bold uppercase mb-4 text-sky-500">
       {{$heading}}
    </h2>
    <form method="{{ $method === 'GET' ? ' GET' : 'POST' }}" action="{{ $action }}">
        @csrf
        @if (!in_array($method, ['GET', 'POST']))
            @method($method)
        @endif

        {{ $slot }}
    </form>
</div>
