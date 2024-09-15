<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Http\Requests\UpdateTodoStatusRequest;
use App\Models\Todo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class TodoController extends Controller
{
    public function create(){
        return view("todos.create");
    }
    public function index(){
        $todos = Todo::orderBy('created_at', 'desc')->get();
        return view("todos.index", ['todos' => $todos]);
    }
    public function edit(int $id)
    {
        $todo = Todo::where('id', $id)->first();
        if($todo == null){
            return abort(404);
        }
        return view("todos.edit", ['todo' => $todo]);
    }
    public function createTodo(CreateTodoRequest $request):JsonResponse{
        $validated = $request->validated();
        Todo::create([
            "title" => $validated["title"],
            "description" => $validated["description"],
            "isDone" => $validated["isDone"]
        ]);
        return response()->json(['success'=> true]);
    }
    public function deleteTodo(int $id):JsonResponse{
        Todo::where('id', $id)->first()->delete();
        return response()->json(['success'=> true]);
    }
    public function updateStatus(UpdateTodoStatusRequest $request, int $id ):JsonResponse{
        $validated = $request->validated();
        Todo::where('id', operator: $id)->update(['is_done'=>$validated['isDone']]);
        return response()->json(['success'=> true]);
    }
    public function updateTodo(UpdateTodoRequest $request, int $id ):JsonResponse{
        $validated = $request->validated();
        Todo::where('id', operator: $id)->update([ 'title'=>$validated["title"],'description'=>$validated["description"], 'is_done'=>$validated['isDone']]);
        return response()->json(['success'=> true]);
    }
}
