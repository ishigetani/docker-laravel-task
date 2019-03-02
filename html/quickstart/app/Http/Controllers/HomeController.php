<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * タスク一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks', compact('tasks'));
    }

    /**
     * タスク追加
     * 
     * @return redirect
     */
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            // バリデーションエラー
            return redirect()
                ->route('home')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect()->route('home');
    }

    /**
     * タスク削除
     * 
     * @return redirect
     */
    public function delete(Task $task)
    {
        $task->delete();

        return redirect()->route('home');
    }
}
