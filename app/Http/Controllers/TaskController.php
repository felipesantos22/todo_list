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
        Task::create($request->all());
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
        $tasks = Task::findOrFail($id);
        $tasks->delete();
        return redirect('/');
    }

    public function destroyApi($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $task->delete();
        return response()->json(['message' => 'User excluído com sucesso']);
    }

    public function showWeb($id)
    {
        $task = Task::find($id);
        return view('edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return redirect('/')->with('success', 'Tarefa atualizada com sucesso!');
    }
}
