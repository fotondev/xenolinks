@props(['event'])
<div class="p-4 pb-3 sm:pb-4 bg-secondary hover:bg-primary">
    <div class="flex items-center space-x-4">
        <div class="flex-shrink-0">
            <img class="w-8 h-8 rounded-full"
                src="{{ $event->logo ? asset('logos/' . $event->logo) : asset('/img/no-image.png') }}" alt="">
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-sm font-medium text-tertiary truncate dark:text-white">
                {{ $event->title }}
            </p>
            <p class="text-sm text-tertiary truncate dark:text-gray-400">
                {{ $event->start_date }}
            </p>
          
        </div>
        @if($event->participants_count)
        <x-participants-icon />
        <span class="text-sm text-gray-500 truncate dark:text-gray-400">
            {{ $event->participants_count }}
        </span>
        @endif
        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
          <x-event-status :status="$event->status"  />
        </div>
    </div>
</div>
