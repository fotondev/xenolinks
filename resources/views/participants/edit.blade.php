<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex">
            <div class="text-black-500 border-2 border-gray-200 p-10 rounded max-w-lg mx-auto mt-8">
                <form  method="POST" action="{{route('participant.update', $event->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="mt-4">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input name="name" id="name" class="block mt-1 w-full" type="text"
                            name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>
                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input name="email" id="email" class="block mt-1 w-full" type="email"
                            name="email" :value="old('email')" autofocus autocomplete="email" />
                    </div>
                    <div>
                        <x-label name="userId" for="userId" value="{{ __('ID пользователя') }}" />
                        <x-input id="userId" class="block mt-1 w-full" type="text" name="user_id"
                            :value="old('user_id')" />
                    </div>
                    <x-button class="mt-4">
                        {{ __('Подтвердить') }}
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
