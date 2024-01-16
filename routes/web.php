<?php

use App\Http\Controllers\FamilyController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PlantTypeController;
use App\Http\Controllers\SuccessionController;
use App\Http\Controllers\VarietyController;
use App\Models\Plan;
use App\Models\Variety;
use Carbon\Carbon;
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

Route::get('/test2', function () {
    return view('test2', [
        // 'plan' => Plan::find(9),
        // 'varieties' => Variety::all(),
        // 'today' => Carbon::now(),
        // 'sorted' => Plan::all()->sortBy([
        //     ['sow_start', 'asc'],
        //     ['harvest_end', 'asc'],
        // ]),
    ]);
});

Route::get('test', function () {
    return view('test', [
        'plan' => Plan::find(9),
        'varieties' => Variety::all(),
        'today' => Carbon::now(),
        'pid' => 8,
    ]);
});

// Route::get('/blog',  [FamilyController::class, 'index']); // doesn't give named routes   ---vid 7

Route::resource('family', FamilyController::class);

Route::resource('plantType', PlantTypeController::class);

Route::resource('variety', VarietyController::class);

Route::resource('succession', SuccessionController::class);
Route::get('sowtoday', [SuccessionController::class, 'sowtoday'])->name('succession.sowtoday');

Route::resource('journal', JournalController::class);

Route::get('journal/newSowing/{sid}', [JournalController::class, 'newSowing'])->name('journal.newSowing');
Route::get('journal/addJournal/{pid}', [JournalController::class, 'addJournal'])->name('journal.addJournal');

// Route::post('plan', [PlanController::class, 'store']);
Route::resource('plan', PlanController::class);
Route::get('plan/planttype/{id}', [PlanController::class, 'addPlantType'])->name('plan.addPlantType');
Route::get('plan/addSuccession/{sid}', [PlanController::class, 'addSuccession'])->name('plan.addSuccession');

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
