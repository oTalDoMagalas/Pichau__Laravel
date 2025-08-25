<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Cadastro aberto (sem precisar estar logado)
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Login e autenticação
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Esqueci a senha
Route::get('password/reset', [ResetPasswordController::class, 'showEditForm'])->name('password.request');
Route::post('password/reset', [ResetPasswordController::class, 'update'])->name('password.update');

// Rotas protegidas (só quem está logado acessa)
Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class)->except(['create', 'store']);
});
