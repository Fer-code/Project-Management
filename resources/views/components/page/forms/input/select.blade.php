@props(['disabled' => false])

<?php
    $baseClass = "w-full md:w-1/2 my-2 py-4 px-4 block border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600";
?>

<select 
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge(['class' => $baseClass]) !!}
>
    {{$slot}}
</select>