<?php

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Validation\Validator;

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
    // タスク一覧
    return view('tasks');
});

Route::post('/task', function (Request $request) {
    // タスク追加
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255'
    ]);

    if ($validator->fails()) {
        // バリデーションエラー
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
});

Route::delete('/task/{task}', function (Task $task) { });
