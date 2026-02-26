@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-pink-light-200 dark:border-purple-dark-600 bg-white/50 dark:bg-purple-dark-700/50 focus:border-winnicode-pink dark:focus:border-purple-dark-400 focus:ring-winnicode-pink dark:focus:ring-purple-dark-400 rounded-lg shadow-sm transition-colors duration-200']) }}>
