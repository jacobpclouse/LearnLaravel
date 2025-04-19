<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\YourEntryController;

// Route::get('/', function () {
//     return Inertia::render('Welcome');
// })->name('home');

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ----- ADD MIDDLEWARE VAL ----
// Route to display the form
Route::get('/entries/create', function () {
    return Inertia::render('Entries/CreateEntry');
})->name('entries.create');

// Route to handle the form submission
Route::post('/entries', [YourEntryController::class, 'store'])->name('entries.store');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
