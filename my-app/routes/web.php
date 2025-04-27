<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\YourEntryController;
use App\Models\YourEntry;

// Dashboard route
Route::get('/', function () {
    $all = YourEntry::all();

    return Inertia::render('Dashboard',['all'=>$all]);// getting all my entries and passing all the entries to the dashboard as a prop
})->middleware(['auth:web', 'verified'])->name('dashboard');


// ----- ADD MIDDLEWARE VAL ----
// Route to display the form
Route::get('/entries/create', function () {
    return Inertia::render('Entries/CreateEntry');
})->name('entries.create');

// Route to handle the form submission
Route::post('/entries', [YourEntryController::class, 'store'])->name('entries.store');


// route to get/view all entries in the database
Route::get('/entries', [YourEntryController::class, 'index'])->name('entries.index');


// editing:
// Route for displaying the edit form
Route::get('/entries/{entry}/edit', [YourEntryController::class, 'edit'])->name('entries.edit');

// Route for processing the update
Route::put('/entries/{entry}', [YourEntryController::class, 'update'])->name('entries.update');


// deleting:
Route::delete('/entries/{entry}', [YourEntryController::class, 'destroy'])->name('entries.destroy');



// Test entries -- https://laravel.com/docs/12.x/routing
Route::get('/greeting', function () {

    return 'Hello World';

});


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
