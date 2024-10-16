<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\project;

class projectController extends Controller
{

    public function index()
    {
        return view('project.index' , [
            'project' => project::all()
        ]);
    }


    public function create()
    {
        return view('project.create');
    }


    public function store(Request $request)
    {
        $project = new project();

$project->Title = $request->input('Title');
$project->Details = $request->input('Details');
$project->created_at = $request->input('created_at');
$project->save();
return redirect()->action([\App\Http\Controllers\projectController::class, 'index'])->with('success', 'successfuly' );
    }


    public function show($id)
    {
        return view('project.show' , [
            'project' => project::findOrFail($id)
        ]);
    }

 
    public function edit($id)
    {
        return view('project.edit' , [
            'project' => project::findOrFail($id)
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $project = new project();
$project = project::findOrFail($id);
$project->Title = $request->input('Title');
$project->Details = $request->input('Details');
$project->created_at = $request->input('created_at');
$project->save();
return redirect()->action([\App\Http\Controllers\projectController::class, 'index'])->with('success', 'successfuly' );
    }


    public function destroy($id)
    {
        $to_delet = project::findOrFail($id);
$to_delet->delete();
        return redirect()->action([\App\Http\Controllers\projectController::class, 'index'])->with('success', 'Deleted successfuly' );
    }
}
