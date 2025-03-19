<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Page d\'accueil')</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <!-- Inclusion du contenu dynamique -->
        @yield('content')
    </body>
</html>
