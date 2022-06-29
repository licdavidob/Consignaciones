<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowConsignaciones;
// use App\Http\Controllers\ConsignacionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard',[ConsignacionController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard',ShowConsignaciones::class);
    Route::get('/dashboard',ShowConsignaciones::class)->name('dashboard');
        // Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
        // Route::get('/dashboard/pruebas', [ConsignacionController::class, 'index']);
    });

Route::apiresource('Consignacion','App\Http\Controllers\ConsignacionController');
Route::view('/', 'auth.login');


