<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ url()->previous() }}" >Back</a>

    <h1>Tasks</h1>
    <a href="{{ route('task.index' ) }}">Tasks</a>

    <h1 class="">Projects</h1>

    <a href="{{ route('project.create') }}"> <b>Add Project</b></a>

    <ul>

        @foreach ($projects  as $project)
        <li> {{ $project->title }}</li>
        <li>{{ $project->id }}</li>

        <a href="{{ route('project.edit' , $project->id) }}"> Edit </a>

        <form action="{{ route('project.destroy' , $project->id)}}"
            method="POST">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>

        @endforeach
    </ul>

</body>
</html>
