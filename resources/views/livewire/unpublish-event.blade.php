<div>
    <form wire:submit.prevent="unpublish" method="PUT">
        @csrf
        <x-button class="bg-red-500"> {{ __('Сделать невидимым') }}</x-button>
    </form>
</div>
