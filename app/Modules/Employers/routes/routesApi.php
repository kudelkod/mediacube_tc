<?php

use App\Modules\Departments\Controllers\DepartmentsController;
use App\Modules\Employers\Controllers\EmployersController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/employers'], function (){
    Route::get('/fetchEmployers', [EmployersController::class, 'fetchEmployers'])->name('fetchEmployers');
    Route::group(['prefix' => '/card'], function (){
        Route::get('/fetchEmployer', [EmployersController::class, 'fetchEmployer'])->name('fetchEmployer');
        Route::delete('/deleteEmployer', [EmployersController::class, 'deleteEmployer'])->name('deleteEmployer');
        Route::post('/saveEmployer', [EmployersController::class, 'saveEmployer'])->name('saveEmployer');
    });
});
