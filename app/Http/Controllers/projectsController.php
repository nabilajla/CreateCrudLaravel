<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\projects;

class projectsController extends Controller
{

    public function index()
    {
        return view('Dashboard_1999.projects.index' , [
            'projects' => projects::all()
        ]);
    }


    public function create()
    {
        return view('Dashboard_1999.projects.create');
    }


    public function store(Request $request)
    {
        $projects = new projects();

$projects->save();
return redirect()->action([\App\Http\Controllers\projectsController::class, 'index'])->with('success', 'successfuly' );
    }


    public function show($id)
    {
        return view('Dashboard_1999.projects.show' , [
            'projects' => projects::findOrFail($id)
        ]);
    }


    public function edit($id)
    {
        return view('Dashboard_1999.projects.edit' , [
            'projects' => projects::findOrFail($id)
        ]);
    }


    public function update(Request $request, $id)
    {
        $projects = new projects();
$projects = projects::findOrFail($id);
$projects->save();
return redirect()->action([\App\Http\Controllers\projectsController::class, 'index'])->with('success', 'successfuly' );
    }


    public function destroy($id)
    {
        $to_delet = projects::findOrFail($id);
$to_delet->delete();
        return redirect()->action([\App\Http\Controllers\projectsController::class, 'index'])->with('success', 'Deleted successfuly' );
    }
}
