<?php

use App\Http\Controllers\Controller;
use App\Modules\Departments\Controllers\DepartmentsController;
use App\Modules\Employers\Controllers\EmployersController;
use Illuminate\Support\Facades\Route;

Route::get("{path?}",[EmployersController::class,'index'])->where('path', '.*')->name('employers');
