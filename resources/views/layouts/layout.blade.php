<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Personas</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->

    <link rel="stylesheet" href="/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/app.css" />
    <link rel="stylesheet" href="/css/navbar.css" />
    <link rel="stylesheet" href="/css/main.css" />

</head>

<body>


    <header>
        @include("layouts/navbar")
    </header>
    @yield("cabecera")

    <section class="mt-2">
        <main class="container mt-3">
            @yield('main')
        </main>
    </section>

    <div>
        @yield("modal")
    </div>

    <script src="/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/app.js" type="text/javascript"></script>
    <script src="/main.js" type="text/javascript"></script>
</body>

</html>