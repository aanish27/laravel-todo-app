<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <form
        action="{{ route('task.store') }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <label for="title">Title</label>
        <input type="text" name="title" required>

        <label for="description">Description</label>
        <input type="text" name="description">

        <label for="priority">Priority</label>
        <select name="priority" id="priority">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="High">High</option>
        </select>



        <label for="status">Status</label>
        <input type="checkbox" name="statusChecked" value="true">
        <input type="hidden" name="status" value="false">

        <input type="hidden" value="1" name="project_id">
        <button type="submit" class="btn btn-primary"> Add </button>
    </form>

</body>
</html>
