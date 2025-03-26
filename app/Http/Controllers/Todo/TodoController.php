<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todos;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $max_data = 5;
        if (request('search')) {
            $data = Todos::where('task', 'like', '%' . request('search') . '%')->paginate($max_data)->withQueryString();
        }else {
            $data = Todos::orderBy('task', 'asc')->paginate($max_data);
        }

        return view('todo.app', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string|max:128|min:3'
        ], [
            'task.required' => 'Task tidak boleh kosong',
            'task.min' => 'Task minimal 3 karakter',
            'task.max' => 'Task maksimal 128 karakter' 
        ]);

        // Create new todo
        $data = [
            'task' => $request->input('task'),
        ];

        // Save to database
        Todos::create($data);
        return redirect()->route('todos')->with('success', 'Task berhasil ditambahkan');

    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'task' => 'required|string|max:128|min:3'
        ], [
            'task.required' => 'Task tidak boleh kosong',
            'task.min' => 'Task minimal 3 karakter',
            'task.max' => 'Task maksimal 128 karakter' 
        ]);

        $data = [
            'task' => $request->input('task'),
            'is_done' => $request->input('is_done')
        ];

        Todos::where('id', $id)->update($data);
        return redirect()->route('todos')->with('success', 'Task berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Todos::where('id', $id)->delete();
        return redirect()->route('todos')->with('success', 'Task berhasil dihapus');
    }
}
