<!doctype html>
<html lang='en'>
<!-- rMikan game/views/templates/master.blade.php -->

<head>

    <title>@yield('title', $app->config('app.name'))</title>

    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' href='/favicon.ico'>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='/css/game.css' rel='stylesheet'>

    @yield('head')

</head>

<body>

    <header>
        <h1>
            <a href='/'><img id='logo' src='/images/5x5_back-n-forth-blank.png'
                    alt='{{ $app->config('app.name') }} logo'></a>
        </h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @yield('body')
    </footer>

    @yield('body')


</body>

</html>
