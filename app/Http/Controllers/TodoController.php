<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Todo;

class TodoController extends Controller
{

    public function index()
    {
        return view('Todo.index' , [
            'Todo' => Todo::all()
        ]);
    }


    public function create()
    {
        return view('Todo.create');
    }


    public function store(Request $request)
    {
        $Todo = new Todo();

$Todo->title = $request->input('title');
$Todo->body = $request->input('body');
$Todo->save();
return redirect()->action([\App\Http\Controllers\TodoController::class, 'index'])->with('success', 'successfuly' );
    }


    public function show($id)
    {
        return view('Todo.show' , [
            'Todo' => Todo::findOrFail($id)
        ]);
    }

 
    public function edit($id)
    {
        return view('Todo.edit' , [
            'Todo' => Todo::findOrFail($id)
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $Todo = new Todo();
$Todo = Todo::findOrFail($id);
$Todo->title = $request->input('title');
$Todo->body = $request->input('body');
$Todo->save();
return redirect()->action([\App\Http\Controllers\TodoController::class, 'index'])->with('success', 'successfuly' );
    }


    public function destroy($id)
    {
        $to_delet = Todo::findOrFail($id);
$to_delet->delete();
        return redirect()->action([\App\Http\Controllers\TodoController::class, 'index'])->with('success', 'Deleted successfuly' );
    }
}
