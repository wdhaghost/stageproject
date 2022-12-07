<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center w-full px-8 py-4 bg-third border border-transparent rounded-2xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-main focus:bg-main active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
