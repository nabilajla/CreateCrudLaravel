<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\articles;

class articlesController extends Controller
{

    public function index()
    {
        return view('articles.index' , [
            'articles' => articles::all()
        ]);
    }


    public function create()
    {
        return view('articles.create');
    }


    public function store(Request $request)
    {
        $articles = new articles();

$articles->Title = $request->input('Title');
$articles->paragraph = $request->input('paragraph');
$articles->Photo = $request->input('Photo');
$articles->save();
return redirect()->action([\App\Http\Controllers\articlesController::class, 'index'])->with('success', 'successfuly' );
    }


    public function show($id)
    {
        return view('articles.show' , [
            'articles' => articles::findOrFail($id)
        ]);
    }

 
    public function edit($id)
    {
        return view('articles.edit' , [
            'articles' => articles::findOrFail($id)
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $articles = new articles();
$articles = articles::findOrFail($id);
$articles->Title = $request->input('Title');
$articles->paragraph = $request->input('paragraph');
$articles->Photo = $request->input('Photo');
$articles->save();
return redirect()->action([\App\Http\Controllers\articlesController::class, 'index'])->with('success', 'successfuly' );
    }


    public function destroy($id)
    {
        $to_delet = articles::findOrFail($id);
$to_delet->delete();
        return redirect()->action([\App\Http\Controllers\articlesController::class, 'index'])->with('success', 'Deleted successfuly' );
    }
}
