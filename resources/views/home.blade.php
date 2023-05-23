<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Все турниры') }}
        </h2>
    </x-slot>
<div class="container mx-auto px-4">
     <div class="text sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-12 border-gray-800 pb-16">
        @foreach ($events as $event)
           <x-event-card :event="$event" />
        @endforeach
    </div> 
</div>
  
   
</x-app-layout>
