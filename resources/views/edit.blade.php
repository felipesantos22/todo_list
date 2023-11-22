 @extends('welcome')

<form action="{{ url("/$task->id") }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="taskName" class="form-label">Tarefa</label>
        <input type="text" class="form-control" id="taskName" name="taskName" required value="{{ $task->taskName }}">
    </div>
    <button type="submit" class="btn btn-dark">Editar tarefa</button>
</form>

