<?php

use App\Http\Controllers\Controller;
use App\Modules\Departments\Controllers\DepartmentsController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", function (){
    return redirect('/grid');
});
Route::get("/grid", function (){
    return view('employers::welcome');
})->name('start');



