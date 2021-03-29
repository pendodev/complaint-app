<?php

use App\Http\Controllers\ComplaintController;
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


Route::middleware(['auth'])->get('/', function () {
    return view('app');
});

Route::middleware([
    'auth'
])->get('/complaints', [ComplaintController::class, 'index']);

Route::middleware([
    'auth'
])->post('/complaints', [ComplaintController::class, 'create']);

require __DIR__.'/auth.php';
