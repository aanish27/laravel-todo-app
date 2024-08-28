<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
</head>
<body>
    <h1>index Task</h1>
    <a href="{{ route('task.create') }}">Create</a>

    <ul>
        @foreach ( $tasks  as $task)
            <li> {{ $task->title }}</li>
            <li>{{ $task->id }}</li>
            <a href="{{ route('task.edit' , $task->id) }}">Edit</a>

            <form action="{{ route('task.destroy' , $task->id) }}"
                method="POST">
                @csrf
                @method('DELETE')

                <button>Delete</button>
            </form>


        @endforeach
    </ul>



</body>
</html>
