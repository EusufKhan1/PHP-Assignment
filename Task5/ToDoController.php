<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index()
    {
        $todos = ToDo::all();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

       ToDo::create($request->all());

        return redirect()->route('todos.index');
    }

    public function edit($id)
    {
        $todo = ToDo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo = ToDo::findOrFail($id);
        $todo->update($request->all());

        return redirect()->route('todos.index');
    }

    public function destroy($id)
    {
        $todo = ToDo::findOrFail($id);
        $todo->delete();

        return redirect()->route('todos.index');
    }
}
