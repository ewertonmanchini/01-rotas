<?php

use Illuminate\Support\Facades\Route;

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
//  php artisan serve  = start o servidor no terminal

Route::get('/', function () {
    return view('welcome');
});

Route::get('/OI', function () {
    return "Seja Bem vindo! Hello World Laravel!!";
});

//{} sao parametros e no caso a baixo obrigatorios
Route::get('/hello/{nome}/{sobrenome}', function ($nome, $sobrenome) {
    return "Seja Bem vindo Laravel! $nome $sobrenome!!";
});

Route::get('/nome/{nome?}', function ($nome=null) {
    if (isset($nome))
        return "Hello, $nome";
    return "Faltou nome!";
});

Route::get('/regra/{nome}/{n}', function ($nome, $n){
    echo "<hr>";
    for ($i=1; $i<$n+1; $i++){
        echo "[$i] Olá! Seja Bem Vindo $nome<br>";
    }
    echo "<hr>";
})
->where('nome', '[A-Za-z0-9]+') //valida se o nome esta entre A-Z e a-z + quantas vezes quizer
->where('n','[0-9]+');//valida se o n esta entre 0-9 + quantas vezes quizer

//rota nomeada so com um parte do link
Route::get('/produtos', function(){
    echo "<hr><h1>Produtos</h1>";
    echo "<ol>";
    echo "<li>Notebook</li>";
    echo "<li>Impressora</li>";
    echo "<li>Mouse</li>";
    echo "<li>Teclado</li>";
    echo "</ol><hr>";
})->name('produtos');//->name coloca o nome na rota

Route::get('/app', function () {
    return view('app');
});