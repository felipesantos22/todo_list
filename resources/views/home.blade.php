<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Todo</title>
</head>

<body>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tarefa</th>
                <th scope="col">Deletar</th>
                {{-- <th scope="col">Alterar</th> --}}
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
                </tr>
            @endforeach
    </table>
    <form action="{{ url('/') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="taskName" class="form-label">Tarefa</label>
            <input type="text" class="form-control" id="taskName" name="taskName" required>
        </div>
        <button type="submit" class="btn btn-dark">Criar tarefa</button>
    </form>


    {{-- {{ $tasks->links() }} --}}


</body>

</html>
