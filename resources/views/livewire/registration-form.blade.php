<div>
    <x-form method="POST" wire:submit.prevent="saveSettings" heading="Настройки регистрации">
        <x-form-group label="deadline" value="Конец регистрации">
            <x-input type="datetime-local"  wire:model.defer="deadline" id="deadline" name="deadline" />
            <x-input-error for="deadline" />
        </x-form-group>
        <x-form-group label="fee" value="Вступительный взнос">
            <x-input type="number"  wire:model.defer="fee" id="fee" name="fee" />
            <x-input-error for="deadline" />
        </x-form-group>
        <div class="flex items-center justify-between">
            <x-button>
                Сохранить
            </x-button>
        </div>
    </x-form>
</div>
