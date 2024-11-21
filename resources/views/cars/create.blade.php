<form action="/cars" method="POST">
    @csrf
    <label for="plate">Rendszám:</label>
    <input type="text" name="plate" id="plate" required>
    <label for="brand">Márka:</label>
    <input type="text" name="brand" id="brand" required>
    <label for="type">Modell:</label>
    <input type="text" name="type" id="type" required>

    <label for="year">Évjárat:</label>
    <input type="number" name="year" id="year" required>
    <label for="issue">Hiba leírása:</label>
    <textarea name="issue" id="issue" required></textarea>
    <button type="submit">Hozzáadás</button>
</form>
