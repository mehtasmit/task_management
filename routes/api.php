<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::post('/login', LoginController::class);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/projects', [ProjectController::class, 'index']);
    Route::post('/projects', [ProjectController::class, 'store']);
    Route::get('/projects/{id}', [ProjectController::class, 'show']);

    Route::get('/projects/{project}/tasks', [TaskController::class, 'index']);
    Route::post('/projects/{project_id}/tasks', [TaskController::class, 'store']);
    Route::patch('/tasks/{id}/status', [TaskController::class, 'updateStatus']);
});
