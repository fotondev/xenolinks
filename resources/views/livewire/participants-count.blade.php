<div class="flex">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg flex gap-10 text-black-500 p-10 rounded mx-auto mt-4 bg-secondary">
        <div class="flex flex-col">
            <p>Кол-во участников</p>
            <span class="text-7xl">{{ count($event->participants) }}</span>
        </div>
        <div class="flex flex-col">
            <p>Кол-во подтвержденных</p>
            <span class="text-7xl">{{ count($checked) }}</span>
        </div>
        <div class="flex flex-col">
            <p>Размер турнира</p>
            <span class="text-7xl">{{ $event->size }}</span>
        </div>
    </div>
</div>
\