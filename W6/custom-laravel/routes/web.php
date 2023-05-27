<?php

use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

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

Route::post('/insertData', [PegawaiController::class, 'createData']);
Route::post('/getData/{id}', [PegawaiController::class, 'getData']);
Route::post('/updateData/{id}', [PegawaiController::class, 'updateData']);

Route::delete('/deleteData/{id}', [PegawaiController::class, 'deleteData']);

Route::get('/', [PegawaiController::class, 'index']);

Route::get('/welcome', function () {
    return view('welcome');
});
// Route::get('/', function () {
//     return view('homepage');
// });

// Route::get('/pegawai', [PegawaiController::class, 'index']);