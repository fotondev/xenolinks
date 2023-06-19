@props(['status'])

<span class="rounded-full px-2 py-1 
    {{ $status === \App\Enums\EventStatus::Setup ? 'bg-yellow-500 text-white' : '' }}
    {{ $status === \App\Enums\EventStatus::Pending ? 'bg-yellow-500 text-white' : '' }}
    {{ $status === \App\Enums\EventStatus::Launched ? 'bg-green-500 text-white' : '' }}
    {{ $status === \App\Enums\EventStatus::Finished ? 'bg-red-500 text-white' : '' }}">
  {{ $status }}
</span>