<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Books Project</title>

    @vite('resources/css/app.scss')

</head>
<body>

    @include('common.navigation', [
        'current_menu_item' => $current_menu_item
    ])

    @yield('content')

    @vite('resources/js/app.js')

</body>
</html>