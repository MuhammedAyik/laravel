<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/planeten', function () {
    $planets = [
        [
            'name' => 'Mars',
            'description' => 'Mars is the fourth planet from the Sun and the second-smallest planet in the Solar System, being larger than only Mercury.'
        ],
        [
            'name' => 'Venus',
            'description' => 'Venus is the second planet from the Sun. It is named after the Roman goddess of love and beauty.'
        ],
        [
            'name' => 'Earth',
            'description' => 'Our home planet is the third planet from the Sun, and the only place we know of so far thats inhabited by living things.'
        ],
        [
            'name' => 'Jupiter',
            'description' => 'Jupiter is a gas giant and doesn't have a solid surface, but it may have a solid inner core about the size of Earth.'
        ],
    ];

    return view('planets')->with(['planets' => $planets]);
});
use Illuminate\Support\Facades\View;

Route::get('/planets', function () {
    $filteredPlanet = request('planet');

    $planets = [
    ];

    if ($filteredPlanet) {
        $planets = collect($planets)->where('name', $filteredPlanet)->all();
    }

    return View::make('planets', ['planets' => $planets]);
});
