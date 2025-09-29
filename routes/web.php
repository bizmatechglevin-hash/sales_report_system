<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\PcController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SaleslogController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/branches', fn() => view('branches'))->name('branches');

Route::post('/branches/{branch}/pcs', [PcController::class, 'store'])->name('pcs.store');
 
Route::delete('/branches/{branch}/pcs/{pc}', [PcController::class, 'destroy'])->name('pcs.destroy');
Route::patch('branches/{branch}/pcs/{pc}/sales', [PcController::class, 'updateSales'])->name('pcs.updateSales');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/pcs/{pc}/saleslogs', [PcController::class, 'viewSaleslogs'])->name('pcs.saleslogs');

Route::post('/saleslogs/{pc}', [SaleslogController::class, 'store'])->name('saleslogs.store');

Route::get('/pcs/{pc}/saleslogs/create', [SaleslogController::class, 'create'])
    ->name('pcs.saleslogs.create');


Route::post('/pcs/{pc}/saleslogs', [SaleslogController::class, 'store'])
    ->name('pcs.saleslogs.store');
    
    

    Route::get('/pcs/{pc}/saleslogs', [SaleslogController::class, 'saleslogs'])->name('pcs.saleslogs');
 





Route::get('/pcs/create', [SaleslogController::class, 'create'])->name('pcs.create');

Route::resource('saleslogs', SaleslogController::class);


Route::resource('branches', BranchController::class);

Route::get('/pcs', fn() => view('pcs'))->name('pcs');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', action: [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
