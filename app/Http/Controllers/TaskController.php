<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    //Api
    public function create(Request $request)
    {
        $task = Task::create($request->all());
        return $task;
    }

    //Web
    public function createWeb(Request $request)
    {
        $task = Task::create($request->all());
        return redirect('/');
    }

    //Api
    public function index()
    {
        $task = Task::paginate(3);
        return $task;
    }

    //Api
    public function indexWeb()
    {
        $tasks = Task::all();
        return view('home', ['tasks' => $tasks]);
    }

    public function destroyWeb($id)
    {
        $task = Task::findOrFail($id);
        $delteTask = $task->delete();
        return redirect('/');
    }

    public function destroyApi($id)
    {
        $users = User::find($id);
        if (!$users) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $users->delete();
        return response()->json(['message' => 'User excluído com sucesso']);
    }
}
