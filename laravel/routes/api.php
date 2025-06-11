<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleUserController;

Route::prefix('auth')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile'])->name('auth.profile')->middleware('auth:sanctum');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/roles', RoleController::class);

    Route::get('/users/{user}/roles', [RoleUserController::class, 'index'])->name('users.roles.index');
    Route::put('/users/{user}/roles', [RoleUserController::class, 'sync'])->name('users.roles.sync');

    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

Route::get('/', fn () => response()->json(['message' => 'ok']));
