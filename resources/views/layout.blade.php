<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Autószerelő Műhely</title>
</head>
<body>
    <header>
        <h1>Autószerelő Műhely</h1>
        <nav>
            <ul>
                <li><a href="{{ route('cars.index') }}">Autók listája</a></li>
                <li><a href="{{ route('cars.create') }}">Új autó felvétele</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Autószerelő Műhely</p>
    </footer>
</body>
</html>
