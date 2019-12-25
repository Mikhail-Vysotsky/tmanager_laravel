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

use App\Tasks;
use Illuminate\Contracts\Validation\Validator;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', function () {
    return view('tasks');
});
Route::post('/tasks/add', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);
    if ($validator->fails()) {
        return redirect('/tasks')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Tasks;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});
Route::get('/tasks/edit/{id_task}', function ($id_task = null) {
    return 'edit task '.$id_task;
})->where('id_task', '[0-9]+');
Route::get('/tasks/delete/{id_task}', function ($id_task = null) {
    return 'delete task '.$id_task.' (2api)';
})->where('id_task', '[0-9]+');


/**
 * Users
 */
Route::get('/users', function () {
    return 'just users list';
});
Route::get('/users/add', function () {
    return 'add new user';
});
Route::get('/users/edit/{id_user}', function ($id_user = null) {
    return 'edit '.$id_user.' user';
})->where('id_user', '[0-9]+');

Route::get('/users/delete/{id_user}', function ($id_user = null) {
    return 'delete '.$id_user.' user';
})->where('id_user', '[0-9]+');