<?php
    $baseClass = "font-semibold text-2xl mb-5";
?>

<h1 {!! $attributes->merge(['class' => $baseClass]) !!}>{{$slot}}</h1>