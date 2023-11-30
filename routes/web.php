<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DokumenTableController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\RDHPTableController;
use App\Http\Controllers\DokumenRdhpController;
use App\Http\Controllers\DokumenRptpController;
use App\Http\Controllers\RPTPTableController;
use App\Http\Controllers\KategoriTableController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ArtikelKategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KepegawaianController;
use App\Http\Controllers\SKTableController;
use App\Http\Controllers\SKController;
use App\Http\Controllers\SDMController;
use App\Http\Controllers\DUKTableController;
use App\Http\Controllers\SNITableController;
use App\Http\Controllers\LaporanTableController;
use App\Http\Controllers\ProposalTableController;
use App\Http\Controllers\MatrikTableController;
use App\Http\Controllers\KAKTableController;
use App\Http\Controllers\LakinTableController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::get('/', [ArtikelController::class, 'index'])->name('artikel');
Route::get('getDokumen', [DokumenController::class, 'getDokumen'])->name('getDokumen');

Route::middleware(['auth:sanctum', 'can:admin'])->group(function () {
    Route::prefix('admin-page')->group(function () {
        Route::get('/home', [DokumenController::class, 'index'])->name('admin.index');
        Route::resources([
            'dokumen' => DokumenController::class,
            'dokumen_rptp' => DokumenRptpController::class,
            'dokumen_rdhp' => DokumenRdhpController::class,
            'kategori' => KategoriController::class,
            'kepegawaian' => KepegawaianController::class,
            'sk-table' => SKTableController::class,
            'sk' => SKController::class,
            'user' => UserController::class,
            'article' => ArticleController::class,
            'kategori_artikel' => ArtikelKategoriController::class,
        ]);
        Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
    });
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
    Route::get('/detail-artikel/{id}', [ArtikelController::class, 'detailartikel'])->name('detail-artikel');
    Route::get('/dokumen-table', [DokumenTableController::class, 'index'])->name('dokumen-table');
    Route::get('/kategori-table', [KategoriTableController::class, 'index'])->name('kategori-table');
    Route::get('/rdhp-table', [RDHPTableController::class, 'index'])->name('rdhp-table');
    Route::get('/rptp-table', [RPTPTableController::class, 'index'])->name('rptp-table');
    Route::get('/kepegawaian', [KepegawaianController::class, 'index'])->name('kepegawaian');
    Route::get('/sk-table', [SKTableController::class, 'index'])->name('sk-table');
    Route::get('/sdm', [SDMController::class, 'index'])->name('sdm');
    Route::get('/duk', [DUKTableController::class, 'index'])->name('duk');
    Route::get('/sni', [SNITableController::class, 'index'])->name('sni');
    Route::get('/program', [ProgramController::class, 'index'])->name('program');
    Route::get('/format-laporan', [LaporanTableController::class, 'index'])->name('format-laporan');
    Route::get('/format-proposal', [ProposalTableController::class, 'index'])->name('format-proposal');
    Route::get('/format-matrik', [MatrikTableController::class, 'index'])->name('format-matrik');
    Route::get('/format-kak', [KAKTableController::class, 'index'])->name('format-kak');
    Route::get('/format-lakin', [LakinTableController::class, 'index'])->name('format-lakin');
    Route::get('/search', [ArtikelController::class, 'search'])->name('search');
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
});