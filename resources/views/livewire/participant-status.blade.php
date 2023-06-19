@php
    use App\Enums\EventStatus;
@endphp


@if (Auth::user()->can('event-update', $participant->event) && $participant->event->editable())
    <label class="relative inline-flex items-center cursor-pointer">
        <input wire:model="isChecked" type="checkbox" @if ($isChecked) checked @endif
            class="sr-only peer">
        <div
            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
        </div>
@endif

@if ($isChecked)
    <span class="ml-4 text-sm font-medium text-gray-900">Подтвержден</span>
@else
    <span class="ml-4 text-sm font-medium text-gray-900">Не подтвержден</span>
@endif

</label>
