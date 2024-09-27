<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui você pode registrar as rotas para sua aplicação. Essas rotas são
| carregadas pelo RouteServiceProvider dentro de um grupo que contém o
| middleware "web". Agora crie algo incrível!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
