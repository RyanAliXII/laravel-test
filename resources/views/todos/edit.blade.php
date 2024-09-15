<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit todo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div></div>
    <form class="w-75 mx-auto mt-5" id="editTodoForm" data-id="{{$todo->id}}">
      
        <h1>Edit Todo</h1>
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" value="{{$todo->title}}" class="form-control" id="title" name="title" placeholder="Todo title">
        </div>
      
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control"  id="description" name="description" rows="3">{{$todo->description}}</textarea>
        </div>
        <div class="form-check">
            @if($todo->isDone)
            <input class="form-check-input status-checkbox" name="isDone" type="checkbox"  value="{{$todo->id}}" checked>
            @else
            <input class="form-check-input status-checkbox" name="isDone" value="{{$todo->id}}" type="checkbox">
            @endif
          <label class="form-check-label" for="flexCheckDefault">
            Mark as Done
          </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  @vite(['resources/js/todos/edit.js'])
</html>