<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Books Project</title>

    {{--
        load the result of the entry file resources/css/app.scss
        in a <link rel="stylesheet" ...> tag
    --}}
    @vite('resources/css/app.scss')

</head>
<body>

    @include('common.navigation', [
        'current_menu_item' => $current_menu_item ?? null
    ])

    @include('common.alerts')

    {{--
        display whatever has been put to section
        content before
    --}}
    @yield('content')


    {{--
        load the result of the entry file resources/js/app.js
        in a <script src="..."> tag
    --}}
    @vite('resources/js/app.js')

</body>
</html>