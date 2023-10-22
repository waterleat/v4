<?php

use App\Http\Controllers\FamilyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\PlantTypeController;
use App\Http\Controllers\SuccessionController;
use App\Http\Controllers\VarietyController;
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
    return view('home');
})->name('home');

Route::get('/child', function () {return view('child');});




// Route::get('/blog',  [FamilyController::class, 'index']); // doesn't give named routes   ---vid 7

Route::resource('family', FamilyController::class);

Route::resource('plantType', PlantTypeController::class);

Route::resource('variety', VarietyController::class);

Route::resource('succession', SuccessionController::class);
Route::get('sowtoday', [SuccessionController::class, 'sowtoday'])->name('succession.sowtoday');

Route::resource('journal', JournalController::class);

Route::get('journal/newSowing/{sid}', [JournalController::class, 'newSowing'])->name('journal.newSowing');


// // individual routes
// // GET
// Route::get('family', [FamilyController::class, 'index'])->name('family.index');
// Route::get('family/{id}', [FamilyController::class, 'show'])->name('family.show');

// // POST
// Route::get('family/create', [FamilyController::class, 'create'])->name('family.create');
// Route::post('family', [FamilyController::class, 'store'])->name('family.store');

// // PUT OR PATCH
// Route::get('family/edit/{id}', [FamilyController::class, 'edit'])->name('family.edit');
// Route::patch('family/{id}', [FamilyController::class, update''])->name('family.update');

// // DELETE
// Route::delete('family/{id}', [FamilyController::class, 'destroy'])->name('family.destroy');


