<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Controllers\TasksController;

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

//Display All Tasks
Route::get('/', [TasksController::class,'index']);

Route::get('post',[TasksController::class,'post']);

Route::get('delete', [TasksController::class,'delete']);


