<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    //Api
    public function create(Request $request)
    {
        $data = $request->all();
        $existingTask = Task::where('taskName', $data['taskName'])->first();
        if ($existingTask) {
            return response()->json(['message' => 'Tarefa já existe'], 404);
        }
        $task = Task::create($data);
        return response()->json($task, 201);
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
        $task = Task::all();
        return $task;
    }

    //Api
    public function indexWeb()
    {
        $tasks = Task::all();
        return view('home', ['tasks' => $tasks]);
    }

    //Web
    public function destroyWeb($id)
    {
        $tasks = Task::findOrFail($id);
        $tasks->delete();
        return redirect('/');
    }

    //Api
    public function destroyApi($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $task->delete();
        return response()->json(['message' => 'User excluído com sucesso']);
    }

    //Web
    public function showWeb($id)
    {
        $task = Task::find($id);
        return view('edit', compact('task'));
    }

    //Web
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return redirect('/')->with('success', 'Tarefa atualizada com sucesso!');
    }

    //Api
    public function updateApi(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        if (!$task) {
            return response()->json(['message' => 'Task não encontrada!']);
        }
        $task->update($request->all());
        return response()->json(['message' => 'Task atualizada com sucesso!']);
    }
}
