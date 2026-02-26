<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-winnicode-pink to-winnicode-blue border border-transparent rounded-lg font-semibold text-white uppercase tracking-wide shadow-lg hover:from-pink-600 hover:to-blue-700 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-winnicode-pink focus:ring-offset-2 active:from-pink-700 active:to-blue-800 transition-all duration-200']) }}>
    {{ $slot }}
</button>
