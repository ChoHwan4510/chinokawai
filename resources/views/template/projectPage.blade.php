<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=deivce-width, initial-scale=1.0" />

        <link rel="stylesheet" href="{{ mix('/css/reset.css') }}" />
        <link rel="stylesheet" href="{{ mix('/css/baseCss.css') }}"/>
        <title>@yield('title')</title>
    </head>

    @stack('css')

    <body>
        @yield('content')

        @stack('scripts')
    </body>
</html>
