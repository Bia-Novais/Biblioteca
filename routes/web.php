<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Perfil do usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rota para listar livros
    Route::get('/livros', [LivroController::class, 'index'])->name('livros.index');

    // Rota para criar um novo livro
    Route::post('/livros', [LivroController::class, 'store'])->name('livros.store');

    // Rota para mostrar um livro específico
    Route::get('/livros/{id}', [LivroController::class, 'show'])->name('livros.show');

    // Rota para editar um livro
    Route::get('/livros/{id}/editar', [LivroController::class, 'editar'])->name('livros.edit');

    // Rota para atualizar um livro
    Route::put('/livros/{id}', [LivroController::class, 'update'])->name('livros.update');

    // Rota para deletar um livro
    Route::delete('/livros/{id}', [LivroController::class, 'destroy'])->name('livros.destroy');

    // Rota para download de livro
    Route::get('/livros/{id}/download', [LivroController::class, 'download'])->name('livros.download');
});

require __DIR__.'/auth.php';

