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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as'=> 'signin'
]);

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as'=> 'signup'
]);

Route::get('/dashboard', [
    'uses' => 'PostsController@getDashboard',
    'as' => 'dashboard',
    'middleware'=> 'auth'
]);

Route::post('/createpost', [
    'uses' => 'PostsController@postCreatePost',
    'as' => 'post.create',
    'middleware'=> 'auth'
]);

Route::get('/post-delete/{post_id}', [
    'uses' => 'PostsController@getDeletePost',
    'as' => 'post.delete',
    'middleware'=> 'auth'
]);

Route::get('/logout', [
   'uses' => 'UserController@getLogOut',
   'as' => 'logout'
]);

Route::post('/edit', [
    'uses' => 'PostsController@postEditPost',
    'as' => 'edit',
]);

Route::get('/account', [
    'uses' => 'UserController@getAccount',
    'as' => 'account'
]);

Route::post('/updateaccount', [
    'uses' => 'UserController@postSaveAccount',
    'as' => 'account.save'
]);

Route::post('/like', [
    'uses' => 'PostsController@postLikePost',
    'as' => 'like'
]);

Route::get('/userimage/{filename}', [
    'uses' => 'UserController@getUserImage',
    'as' => 'account.image'
]);
