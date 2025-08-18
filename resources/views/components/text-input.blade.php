@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-red-800 dark:border-red-800 !border-opacity-30 bg-app focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 text-app rounded-md shadow-sm']) }}>
