<?php
namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $tasks = Task::orderBy('created_at', 'asc')->get()->where('user_id', Auth::user()->id);

        return view('tasks', compact('tasks'));
    }

    /**
     * タスク追加
     * 
     * @return redirect
     */
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|max:199'
        ]);

        $task = new Task;
        $task->name = $request->name;
        $task->user_id = Auth::user()->id;
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
