<?php

use App\Http\Livewire\ShowImports;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowTransactions;
use App\Http\Livewire\ShowTransformers;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/imports', ShowImports::class)->name('imports');
    Route::get('/transactions', ShowTransactions::class)->name('transactions');
    Route::get('/transformers', ShowTransformers::class)->name('transformers');
});

require __DIR__.'/auth.php';
