<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
});
Route::get('call-procedure', function () { 
    $users = DB::select(
       'CALL getAllUsers'
    );  
    dd($users);
});
Route::get('user-by-id', function () { 
    $user = DB::select(
       'CALL get_users_by_userid(3)'
    );  
    dd($user);
});
Route::get('insert-user', function () { 
    return view('insert-user');
});

Route::post('insert-user', function () { 
    $user = DB::select(
       'CALL insert_users(?,?,?)',
       [
        request()->input('name'),
        request()->input('email'),
        Hash::make(request()->input('password')),
        ]
    );  
    return redirect()->back();
})->name('insert');
