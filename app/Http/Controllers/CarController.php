<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index() {
      /*  $cars = [
            ['brand' => 'Suzuki', 'model' => 'Swift', 'plate' => 'ABC-123'],
            ['brand' => 'Ford', 'model' => 'Focus', 'plate' => 'XYZ-789'],
            ['brand' => 'BMW', 'model' => '320i', 'plate' => 'DEF-456'],
        ];
        return view('cars.index', compact('cars'));*/
 
    $cars = Car::all(); // Összes autó lekérdezése az adatbázisból
    return view('cars.index', compact('cars'));

    }
    public function create()
{
    return view('cars.create'); // Az űrlapot tartalmazó nézet
}
    
    public function show($plate) {
       /* $cars = [
            'ABC-123' => ['brand' => 'Suzuki', 'type' => 'Swift', 'plate' => 'ABC-123'],
            'XYZ-789' => ['brand' => 'Ford', 'type' => 'Focus', 'plate' => 'XYZ-789'],
            'DEF-456' => ['brand' => 'BMW', 'type' => '320i', 'plate' => 'DEF-456'],
        ];
    
        if (!array_key_exists($plate, $cars)) {
            return "Nincs ilyen autó a rendszerben.";
        }
    
        return view('cars.show', ['car' => $cars[$plate]]);*/
        $car = Car::where('plate', $plate)->first(); // Autó lekérdezése rendszám alapján

        if (!$car) {
            return "Nincs ilyen autó a rendszerben.";
        }
    
        return view('cars.show', compact('car'));
    }
    public function store(Request $request) {
        // Adatok validálása
        $request->validate([
            'plate' => 'required|unique:cars|max:10',
            'brand' => 'required|string|max:50',
            'type' => 'required|string|max:50',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'issue' => 'required|string',
        ]);
    
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
    
    public function edit($id) {
        $car = Car::findOrFail($id); // Az ID alapján betöltjük az adatokat
        return view('cars.edit', compact('car')); // Átadjuk a nézetnek
    }
    public function update(Request $request, $id) {
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
