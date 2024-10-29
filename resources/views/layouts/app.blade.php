<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @vite('resources/sass/app.scss')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Inea</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Inventário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dados Brutos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Configurações</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    @vite('resources/js/app.js')
</body>
</html>