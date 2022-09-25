<?php

use App\Http\Controllers\NPIController;
use Illuminate\Support\Facades\Route;

Route::post('npi', NPIController::class)->name('api.npi');
