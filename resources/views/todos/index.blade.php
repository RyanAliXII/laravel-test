<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
   
    <div class="w-75 mx-auto mt-5" >
        <div class="p-4">
        <h1>Todos</h1>
        <a href="/todos/create" class="btn btn-primary"> Create </a>
        </div>
        @csrf
        <ul class=>
        @foreach ($todos as $todo)
     
            <li class="list-unstyled mb-2" id="todo-{{$todo->id}}">
            <div class="card">
                <div class="card-header">
                 {{$todo->createdAt}}
                </div>
                <div class="card-body ">
                <div class="d-flex justify-content-between w-full">
                  <div class="p-2">
                    <h5 class="card-title">{{$todo->title}}</h5>
                    <p class="card-text">{{$todo->description}}</p>
                  </div>
                  <div class="d-flex align-items-center">
                        @if($todo->isDone)
                         <input class="form-check-input status-checkbox" type="checkbox"  value="{{$todo->id}}" checked>
                        @else
                         <input class="form-check-input status-checkbox" value="{{$todo->id}}" type="checkbox">
                        @endif
                  </div>
                </div>
                <a class="btn btn-primary" href="/todos/edit/{{$todo->id}}">Edit</a>
                   <button type="button" class="btn btn-danger delete-btn" value="{{$todo->id}}">Delete</button>
                </div>
          </div>
        </li>
       
      @endforeach
    </ul>
      </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@vite(['resources/js/todos/index.js'])
</html>