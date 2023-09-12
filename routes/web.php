<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    LancamentoController,
    CentroCustoController,
    TipoController
};


Route::get('/', function () {
    return redirect()->route('lancamento.index');
})->middleware(['auth', 'verified'])
    ->name('home');

Route::get('/dashboard', function () {
    return redirect()->route('lancamento.index');
    })->middleware(['auth', 'verified'])
        ->name('dashboard');

/**
 * --------------------------
 * | Centro de Custo
 * | 25-08-2023
 * --------------------------
 */
Route::prefix('centro-custo')
    ->controller(CentroCustoController::class)
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'index')
            ->name('centro.index');
        Route::get('/novo', 'create')
            ->name('centro.create');
        Route::get('/editar/{id}', 'edit')
            ->name('centro.edit');
        Route::get('exibir/{id}', 'show')
            ->name('centro.show');

        Route::post('cadastrar', 'store')
            ->name('centro.store');
        Route::post('atualizar/{id}', 'update')
            ->name('centro.update');
        Route::post('excluir/{id}', 'destroy')
            ->name('centro.destroy');
    });


/**
 * --------------------------
 * | Lancamentos
 * | 25-08-2023
 * --------------------------
 */
Route::prefix('lancamento')
->controller(LancamentoController::class)
->middleware('auth')
->group(function () {
    Route::get('/', 'index')
        ->name('lancamento.index');
    Route::get('/novo', 'create')
        ->name('lancamento.create');
    Route::get('/editar/{id}', 'edit')
        ->name('lancamento.edit');
    Route::get('exibir/{id}', 'show')
        ->name('lancamento.show');

    Route::post('cadastrar', 'store')
        ->name('lancamento.store');
    Route::post('atualizar/{id}', 'update')
        ->name('lancamento.update');
    Route::post('excluir/{id}', 'destroy')
        ->name('lancamento.destroy');
});



/**
 * --------------------------
 * | Profile
 * --------------------------
 */
Route::controller(ProfileController::class)
    ->middleware('auth')
    ->group(function () {
        Route::get('/profile', 'edit')
            ->name('profile.edit');
        Route::patch('/profile', 'update')
            ->name('profile.update');
        Route::delete('/profile', 'destroy')
            ->name('profile.destroy');
    });

require __DIR__ . '/auth.php';
