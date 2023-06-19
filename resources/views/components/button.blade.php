<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-sky-700 hover:bg-sky-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline']) }}>
    {{ $slot }}
</button>
