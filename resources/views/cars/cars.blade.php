<table>
    <thead>
        <tr>
            <th>Márka</th>
            <th>Modell</th>
            <th>Rendszám</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cars as $car)
            <tr>
                <td>{{ $car['brand'] }}</td>
                <td>{{ $car['model'] }}</td>
                <td>{{ $car['plate'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
