<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('layout.navbar')


    <main class="max-w-7xl mx-auto px-4 py-8">
        @yield('content')
    </main>


    @include('layout.footer')
</body>

</html>
