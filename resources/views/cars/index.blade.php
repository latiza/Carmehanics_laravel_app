@extends('layout')

@section('content')
    <h1>Autók listája</h1>

    <!-- Sikeres üzenet megjelenítése -->
    @if (session('success'))
        <div style="color: green;">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <!-- Ellenőrzés, hogy vannak-e autók -->
    @if ($cars->isEmpty())
        <p>Nincs rögzített autó.</p>
    @else
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Rendszám</th>
                    <th>Márka</th>
                    <th>Típus</th>
                    <th>Év</th>
                    <th>Probléma</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->plate }}</td>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->type }}</td>
                        <td>{{ $car->year }}</td>
                        <td>{{ $car->issue }}</td>
                        <td>
                            <a href="{{ route('cars.show', $car->plate) }}">Megtekintés</a>
                            <a href="{{ route('cars.edit', $car->id) }}">Szerkesztés</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
