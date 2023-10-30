<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustController;
use App\Http\Controllers\XBeliInforPOController;
use App\Http\Controllers\XJualInforHargaController;
use App\Http\Controllers\XHargaInforController;
use App\Http\Controllers\JualStokPOController;
use App\Exports\JualStokPOExport;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*kdu*/
Route::get('/', function () {return view('kdu');});
Route::get('/kdu/file-import', function () {return view('/kdu/file-import');});
Route::post('/kdu/file-import-po', [XBeliInforPOController::class, 'fileImport'])->name('file-import-po');
Route::post('/kdu/file-import-jual', [XJualInforHargaController::class, 'fileImport'])->name('file-import-jual');
Route::post('/kdu/file-import-harga', [XHargaInforController::class, 'fileImport'])->name('file-import-harga');
Route::get('/kdu/display-jualstokpo',[JualStokPOController::class, 'showJualStokPO']);
Route::get('/kdu/export-jualstokpo/', [JualStokPOController::class, 'export'])->name('export');

require __DIR__.'/auth.php';
