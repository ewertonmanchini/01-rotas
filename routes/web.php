<?php

use Illuminate\Http\Request;
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

/*
//modelo 1
Route::get('/app', function () {
    return view('app');
})->name('app');

Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');

Route::get('/usuario', function () {
    return view('usuario');
})->name('usuario');
*/
//modelo 2

Route::prefix('/app')->group(function(){ //prefix todas as rotas nao iniciar com ele
    Route::get('/', function () {
        return view('app');
    })->name('app.index');        //app. padrao de nome nao obrigatorio
    
    Route::get('/perfil', function () {
        return view('perfil');
    })->name('app.perfil');
    
    Route::get('/usuario', function () {
        return view('usuario');
    })->name('app.usuario');
});

//redicionar um link para outro

Route::get('produtos1', function () {
    return redirect('produtos');    //usando a rota direta
});

Route::get('produtos2', function () {
    return redirect()->route('produtos'); //usando o nome da rota
});

Route::redirect('produtos3', 'produtos', 301);// link digitado, link da rota, codigo de redirecionamento

Route::post('/http_request', function (Request $request) { //salvar objeto no servidor
    return 'Hello POST';
});

Route::delete('/http_request', function (Request $request) { //para apagar algo no servidor
    return 'Hello DELETE';
});

Route::put('/http_request', function (Request $request) { //alterar todo objeto no servidor
    return 'Hello PUT';
});

Route::patch('/http_request', function (Request $request) { //alterar parte do objeto no servidor
    return 'Hello PATCH';
});

Route::options('/http_request', function (Request $request) {
    return 'Hello OPTIONS';
});

Route::get('/http_request', function (Request $request) {
    return 'Hello GET';
});