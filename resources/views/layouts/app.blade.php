<html>
    <head>
        <title>{{ config('app.name', 'Laravel') }} | @yield('title') </title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="{{ asset('css/template.css') }}">
    </head>
    <body>
        @yield('content')
    </body>
</html>