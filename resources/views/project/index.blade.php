@foreach ($projects  as $project)


@endforeach

<body>
    <a href="{{ url()->previous() }}" >Back</a>

    <h1>Tasks</h1>
    <a href="{{ route('task.index' ) }}">Tasks</a>

    <h1 class="">Projects</h1>

    <a href="{{ route('project.create') }}"> <b>Add Project</b></a>

    <ul>


    </ul>

</body>
</html>
