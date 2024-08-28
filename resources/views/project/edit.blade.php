<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1->0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form
        action="{{ route('project.update' , $project->id) }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $project->title }}">

        <label for="description">Description</label>
        <input type="text" name="description" value="{{ $project->description }}">


        <button type="submit"> Add </button>
    </form>

</body>
</html>
