<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [
    'uses' => 'PostagensController@index',
    'as' => '/'
]);

Route::get('create/postagem/{id}', [
    'uses' => 'PostagensController@create',
    'as' => 'create.postagem'
]);

Route::get('create/comentario/{id_user}/{id_post}', [
    'uses' => 'ComentariosController@create',
    'as' => 'create.comentario'
]);

Route::get('delete/postagem/{id}', [
    'uses' => 'PostagensController@delete',
    'as' => 'delete.postagem'
]);

Route::get('edit/postagem/{id}', [
    'uses' => 'PostagensController@edit',
    'as' => 'edit.postagem'
]);

Route::get('update/postagem/{id}', [
    'uses' => 'PostagensController@update',
    'as' => 'update.postagem'
]);

Route::get('postagem/{id}', [
    'uses' => 'PostagensController@show',
    'as' => 'show.postagem'
]);

Route::get('post/{id}', [
    'uses' => 'PostagensController@showPostsFromUser',
    'as' => 'show.postsFromUser'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
