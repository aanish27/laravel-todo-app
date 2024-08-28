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

        action="{{ route('task.update', $task->id) }}"

        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $task->title }}">

        <label for="description">Description</label>
        <input type="text" name="description" value="{{ $task->description }}">

        <label for="priority">Priority</label>
        <select name="priority" id="priority">
            <option value="{{ $task->priority }}">{{ $task->priority }}</option>
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="High">High</option>
        </select>


        <button type="submit"> Add </button>
    </form>

</body>
</html>
