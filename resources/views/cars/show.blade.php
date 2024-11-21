@extends('layout')

@section('content')
    <h1>Autó adatai</h1>

    <p><strong>Márka:</strong> {{ $car->brand }}</p>
    <p><strong>Típus:</strong> {{ $car->type }}</p>
    <p><strong>Rendszám:</strong> {{ $car->plate }}</p>
    <p><strong>Év:</strong> {{ $car->year }}</p>
    <p><strong>Probléma:</strong> {{ $car->issue }}</p>

    <a href="{{ route('cars.index') }}">Vissza a listához</a>
@endsection
