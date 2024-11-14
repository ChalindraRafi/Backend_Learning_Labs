<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        Todo::create($request->all());
        return redirect()->back();
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back();
    }

    // Menampilkan formulir edit
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    // Memperbarui data
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
            'due_date' => 'nullable|date',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->update($request->only(['title', 'description', 'completed', 'due_date']));

        return redirect()->route('todos.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    public function updateStatus(Request $request, $id)
    {
        $todo = Todo::find($id);
        if ($todo) {
            // Mengubah status menjadi selesai atau tidak selesai
            $todo->completed = !$todo->completed; // Toggle status
            $todo->save();

            return redirect()->back()->with('success', 'Status berhasil diperbarui!');
        }

        return redirect()->back()->with('error', 'Todo tidak ditemukan.');
    }
}

