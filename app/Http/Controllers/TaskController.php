<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    //Api
    public function create(Request $request)
    {
        try {
            $data = $request->all();

            // Verifica se o user_id está presente e não está vazio
            if (empty($data['user_id'])) {
                return response()->json(['message' => 'O campo user_id é obrigatório!'], 400);
            }

            // Verifica se o usuário com o id fornecido existe
            $existingUser = User::find($data['user_id']);

            if (!$existingUser) {
                return response()->json(['message' => 'Chave estrangeira não existe!'], 404);
            }

            $task = new Task([
                'taskName' => $data['taskName'],
            ]);

            $existingUser->task()->save($task);

            return response()->json($task, 201);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Erro no banco de dados: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Ocorreu um erro: ' . $e->getMessage()], 500);
        }
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
