<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
          'title' => 'required|max:255',
          'description' => 'nullable',
        ]);

        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed') ? 1 : 0,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('todos.index')->with('success', 'New Todo Created Successfully');  
      }

      public function show(Todo $todo)
      {
        //check if the todo belongs to the authenticated user
        if($todo->user_id !== auth()->id()){
            abort(403, 'Unauthorized action.');
        }

        return view('todos.show', compact('todo'));
      }

      public function edit(Todo $todo)
      {
        //check if the todo belongs to the authenticated user
        if($todo->user_id !== auth()->id()){
            abort(403, 'Unauthorized action.');
        }
        
        return view('todos.edit', compact('todo'));
      }

      public function update(Request $request, Todo $todo)
      {
        //check if the todo belongs to the authenticated user
        if($todo->user_id !== auth()->id()){
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed') ? 1 : 0,
        ]);

        return redirect()->route('todos.index')-> with('success', 'Todo Updated Successfully');
      }

      public function destroy(Todo $todo){
        //check if the todo belongs to the authenticated user
        if($todo->user_id !== auth()->id()){
            abort(403, 'Unauthorized action.');
        }

        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo Deleted Successfully');
      }
}
