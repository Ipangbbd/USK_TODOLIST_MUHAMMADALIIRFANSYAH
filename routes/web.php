<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanController;

Route::get('/', function () {
    return view('kegiatan.index');
});

Route::resource('kegiatan', KegiatanController::class);
