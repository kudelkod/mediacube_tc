<?php

use App\Modules\Departments\Controllers\DepartmentsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/departments'], function (){
    Route::get('/fetchDepartments', [DepartmentsController::class, 'fetchDepartments'])->name('fetchDepartments');
    Route::group(['prefix' => '/card'], function (){
        Route::get('fetchDepartment', [DepartmentsController::class, 'fetchDepartment'])->name('fetchDepartment');
        Route::post('saveDepartment', [DepartmentsController::class, 'saveDepartment'])->name('saveDepartment');
        Route::delete('deleteDepartment', [DepartmentsController::class, 'deleteDepartment'])->name('deleteDepartment');
    });
});
