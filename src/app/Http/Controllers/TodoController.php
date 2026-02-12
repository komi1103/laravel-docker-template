<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all();

        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todo.create'); 
    }

    public function store(Request $request)
    {
        $inputs = $request->all(); 
        $todo = new Todo();
<<<<<<< HEAD
=======
        // $todo->user_id = Auth::id();
>>>>>>> 23062d3dd23362a70a2b29f59d35eff2c2e6564a
        $todo->fill($inputs);
        $todo->save();

        return redirect()->route('todo.index');
    }

}

