<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ProjectTasksController;

/** App routes */
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {

    /** Projects routes */
    Route::get('/projects', [ProjectsController::class, 'index']);
    Route::get('/projects/create', [ProjectsController::class, 'create']);
    Route::get('/projects/{project}', [ProjectsController::class, 'show']);
    Route::get('/projects/{project}/edit', [ProjectsController::class, 'edit']);
    Route::patch('/projects/{project}', [ProjectsController::class, 'update']);
    Route::post('/projects', [ProjectsController::class, 'store']);

    /** Project tasks routes */
    Route::post('/projects/{project}/tasks', [ProjectTasksController::class, 'store']);
    Route::patch('projects/{project}/tasks/{task}', [ProjectTasksController::class, 'update']);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

Auth::routes();

