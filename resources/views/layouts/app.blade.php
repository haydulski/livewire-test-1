<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Body Work Atlas</title>
    @livewireStyles
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>

<body>
    <x-header />

    {{ $slot }}
    <x-footer />
    <script src="{{ mix('js/app.js') }}"></script>

    @livewireScripts
</body>

</html>
