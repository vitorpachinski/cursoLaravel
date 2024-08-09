<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobrenos'])->name('site.sobrenos');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', function(){return 'Login';})->name('site.login');
Route::prefix('/app')->group(function(){
    
    Route::get('/clientes', function(){return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', function(){return 'Fornecedores';})->name('app.fornecedores');
    Route::get('/produtos', function(){return 'Produtos';})->name('app.produtos');

});
 
Route::get(
    '/contato/{nome}/{categoria_id}',
    function (
        $nome = 'Desconhecido',
        $categoria_id = 1
    ) {
        echo 'Estamos aqui, ' . $nome;
        echo ' Categoria ' . $categoria_id;
    }
)->where('categoria_id', '[0-9]+')->where('nome','[A-Za-z]+'); 
// realizando tratamento para que o parametro obtido seja um numero valido [0-9] e que ele receba no minimo um numero '+'
// realizando tratamento para que o parametro obtido seja uma string valida composta por letras [A-Za-z] e que ele receba no minimo uma letra '+'
