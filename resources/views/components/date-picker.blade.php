<form wire:submit.prevent="schedule">

    <div class="mb-1">
        <x-label for="start_date" class="inline-block text-lg mb-2">
            Дата начала события
        </x-label>
        <input wire:model="startDate"  type="datetime-local" class="border border-gray-200 rounded p-2 w-full" value="{{old('endDate')}}" />
        @error('startDate')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-1">
        <x-label for="end_date" class="inline-block text-lg mb-2">
            Дата окончания события
        </x-label>
        <input wire:model="endDate" type="datetime-local" class="border border-gray-200 rounded p-2 w-full"  value="{{old('endDate')}}" />
        @error('endDate')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>

</form>