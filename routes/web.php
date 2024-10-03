<?php

use App\Http\Controllers\Kategori\ControllerKategori;
use App\Http\Controllers\KonserController\ControllerModel;
use App\Http\Controllers\TempatDuduk\ControllerTempatDuduk;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route Konser
Route::get('/konser', [ControllerModel::class, 'index'])->name('konser.index');
Route::get('/konser/${id}/show', [ControllerModel::class, 'show'])->name('konser.show');
Route::get('/create/konser', [ControllerModel::class, 'create'])->name('konser.create');
Route::get('/edit/${id}/konser', [ControllerModel::class, 'edit'])->name('konser.edit');
Route::put('/konser/${id}', [ControllerModel::class, 'update'])->name('konser.update');
Route::post('/konser', [ControllerModel::class, 'store'])->name('konser.store');
Route::delete('/konser/${id}', [ControllerModel::class, 'destroy'])->name('konser.destroy');

// Route kategori
Route::get('/kategori', [ControllerKategori::class, 'index'])->name('kategori.index');
Route::get('/kategori/${id}/show', [ControllerKategori::class, 'show'])->name('kategori.show');
Route::get('/create/kategori', [ControllerKategori::class, 'create'])->name('kategori.create');
Route::get('/edit/${id}/kategori', [ControllerKategori::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/${id}', [ControllerKategori::class, 'update'])->name('kategori.update');
Route::post('/kategori', [ControllerKategori::class, 'store'])->name('kategori.store');
Route::delete('/kategori/${id}', [ControllerKategori::class, 'destroy'])->name('kategori.destroy');


// Route tempat duduk
Route::get('/tempatduduk', [ControllerTempatDuduk::class, 'index'])->name('tempat-duduk.index');
Route::get('/tempatduduk/${id}/show', [ControllerTempatDuduk::class, 'show'])->name('tempat-duduk.show');
Route::get('/create/tempatduduk', [ControllerTempatDuduk::class, 'create'])->name('tempat-duduk.create');
Route::get('/edit/${id}/tempatduduk', [ControllerTempatDuduk::class, 'edit'])->name('tempat-duduk.edit');
Route::put('/tempatduduk/${id}', [ControllerTempatDuduk::class, 'update'])->name('tempat-duduk.update');
Route::post('/tempatduduk', [ControllerTempatDuduk::class, 'store'])->name('tempat-duduk.store');
Route::delete('/tempatduduk/${id}', [ControllerTempatDuduk::class, 'destroy'])->name('tempat-duduk.destroy');




