<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;

Route::get('/', function () {
    return redirect()->route('biodatas.index'); // Langsung diarahkan ke halaman utama CRUD
});

Route::resource('biodatas', BiodataController::class);
