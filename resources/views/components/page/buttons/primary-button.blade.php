<?php
    $baseClass = "float-right whitespace-nowrap px-4 py-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-teal-100 text-teal-800 hover:bg-teal-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-teal-900 dark:text-teal-400";
?>

<button {!! $attributes->merge(['class' => $baseClass]) !!}>
    {{$slot}}
</button>