<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get("/", [MahasiswaController::class, "index"])->name("mahasiswa.index");
Route::get("/mahasiswa/create", [MahasiswaController::class, "create"])->name("mahasiswa.create");
Route::post("/mahasiswa/store", [MahasiswaController::class, "store"])->name("mahasiswa.store");
Route::get("/mahasiswa/edit/{mahasiswa}", [MahasiswaController::class, "edit"])->name("mahasiswa.edit");
Route::put("/mahasiswa/update/{mahasiswa}", [MahasiswaController::class, "update"])->name("mahasiswa.update");
Route::delete("/mahasiswa/delete/{mahasiswa}", [MahasiswaController::class, "delete"])->name("mahasiswa.delete");
