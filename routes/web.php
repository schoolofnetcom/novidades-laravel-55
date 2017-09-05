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

Route::get('/', function () {
    // $user = factory(App\User::class)->create();
    // Auth::login($user);
    return view('welcome');
});

Route::get('/posts', function () {
    if (Cache::lock('lock-name', 60)->get()) {
        $result = \App\Post::all();
        Cache::lock('lock-name')->release();
    } else {
        $result = 'não permitido';
    }
    return $result;
});

Route::get('/users', 'UsersController@index');
Route::get('/users/auth', function () {
    throw new \App\Exceptions\UserDisabledException;
});
Route::get('/users/{id}', 'UsersController@view')->where('id', '[0-9]+');
Route::get('/users/create', 'UsersController@create');
Route::post('/users/create', 'UsersController@store');

Route::redirect('/here', 'there');

Route::view('/my-name-is', 'my.name');
Route::view('/my-name-is', 'my.name', ['name' => 'Erik']);

Route::get('/test/email', function () {
    return new \App\Mail\ConfirmUser;
});
