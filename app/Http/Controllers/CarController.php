<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Autók listázása
    public function index()
    {
        $cars = Car::all(); // Összes autó lekérdezése az adatbázisból
        return view('cars.index', compact('cars'));
    }

    // Új autó felvitelének nézete
    public function create()
    {
        return view('cars.create'); // Az űrlapot tartalmazó nézet
    }

    // Új autó mentése
    public function store(Request $request)
    {
        // Adatok validálása
        $request->validate([
            'plate' => 'required|unique:cars|max:10',
            'brand' => 'required|string|max:50',
            'type' => 'required|string|max:50',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'issue' => 'required|string',
        ]);

        // Teszteljük az adatokat
        //dd($request->all());

        // Adatok mentése
        $car = new Car();
        $car->plate = $request->plate;
        $car->brand = $request->brand;
        $car->type = $request->type;
        $car->year = $request->year;
        $car->issue = $request->issue;
        $car->save();

        // Visszairányítás
        return redirect('/cars')->with('success', 'Az autó adatai sikeresen elmentve!');
    }

    // Egy autó megtekintése rendszám alapján
    public function show($plate)
    {
        $car = Car::where('plate', $plate)->first();

        if (!$car) {
            return "Nincs ilyen autó a rendszerben.";
        }

        return view('cars.show', compact('car'));
    }

    // Autó szerkesztési nézete
    public function edit($id)
    {
        $car = Car::findOrFail($id); // Az ID alapján betöltjük az adatokat
        return view('cars.edit', compact('car')); // Átadjuk a nézetnek
    }

    // Autó frissítése
    public function update(Request $request, $id)
    {
        // Adatok validálása
        $request->validate([
            'plate' => 'required|max:10|unique:cars,plate,' . $id,
            'brand' => 'required|string|max:50',
            'type' => 'required|string|max:50',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'issue' => 'required|string',
        ]);

        // Adatok frissítése
        $car = Car::findOrFail($id);
        $car->plate = $request->plate;
        $car->brand = $request->brand;
        $car->type = $request->type;
        $car->year = $request->year;
        $car->issue = $request->issue;
        $car->save();

        // Visszairányítás és sikerüzenet
        return redirect('/cars')->with('success', 'Az autó adatai sikeresen frissítve!');
    }
}
