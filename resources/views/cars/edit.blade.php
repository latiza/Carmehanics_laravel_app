<form action="{{ route('cars.update', $car->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="plate">Rendszám:</label>
    <input type="text" name="plate" id="plate" value="{{ $car->plate }}" required>

    <label for="brand">Márka:</label>
    <input type="text" name="brand" id="brand" value="{{ $car->brand }}" required>

    <label for="type">Typel:</label>
    <input type="text" name="type" id="type" value="{{ $car->type }}" required>

    <label for="year">Évjárat:</label>
    <input type="number" name="year" id="year" value="{{ $car->year }}" required>

    <label for="issue">Hiba leírása:</label>
    <textarea name="issue" id="issue" required>{{ $car->issue }}</textarea>

    <button type="submit">Mentés</button>
</form>
