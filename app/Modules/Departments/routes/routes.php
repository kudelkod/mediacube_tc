<?php

use App\Http\Controllers\Controller;
use App\Modules\Departments\Controllers\DepartmentsController;
use Illuminate\Support\Facades\Route;

Route::get("{path?}",[DepartmentsController::class,'index'])->where('path', '.*')->name('departments');
