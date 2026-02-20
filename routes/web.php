<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;

// Rotas públicas
Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacto/{contact}', [ContactController::class, 'show'])->name('contacts.show');

// Rotas de autenticação
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rotas protegidas (com URLs diferentes para evitar conflito)
Route::middleware('auth')->group(function () {
    Route::get('/novo-contacto', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/salvar-contacto', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/editar-contacto/{contact}', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/atualizar-contacto/{contact}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/remover-contacto/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});

// Rota de teste (manter para referência)
Route::get('/teste-create', [ContactController::class, 'create'])->name('teste.create');
