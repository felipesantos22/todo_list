@extends('welcome')

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tarefa</th>
            <th scope="col">Deletar</th>
            <th scope="col">Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td class="col-md-2">{{ $loop->iteration }}</td>
                <td class="col-md-8">{{ $task->taskName }}</td>
                <td class="col-md-8">
                    <form action="{{ url("/$task->id") }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Deletar</button>
                    </form>
                </td>
                <td class="col-md-8">
                    <form action="{{ $task->id }}">
                        <button type="submit" class="btn btn-outline-warning">Editar</button>
                    </form>
                </td>
            </tr>
        @endforeach
</table>

<form class="d-flex" role="search" action="/" method="GET">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="taskName">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>

<form action="{{ url('/') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="taskName" class="form-label">Tarefa</label>
        <input type="text" class="form-control" id="taskName" name="taskName" required>
    </div>
    <button type="submit" class="btn btn-dark">Criar tarefa</button>
</form>
{{-- {{ $tasks->links() }} --}}
