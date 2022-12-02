<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\School;

class SchoolController extends Controller
{

    public function index()
    {
        return view('School.index' , [
            'School' => School::all()
        ]);
    }


    public function create()
    {
        return view('School.create');
    }


    public function store(Request $request)
    {
        $School = new School();

$School->save();
return redirect()->action([\App\Http\Controllers\SchoolController::class, 'index'])->with('success', 'successfuly' );
    }


    public function show($id)
    {
        return view('School.show' , [
            'School' => School::findOrFail($id)
        ]);
    }


    public function edit($id)
    {
        return view('School.edit' , [
            'School' => School::findOrFail($id)
        ]);
    }


    public function update(Request $request, $id)
    {
        $School = new School();
$School = School::findOrFail($id);
$School->save();
return redirect()->action([\App\Http\Controllers\SchoolController::class, 'index'])->with('success', 'successfuly' );
    }


    public function destroy($id)
    {
        $to_delet = School::findOrFail($id);
$to_delet->delete();
        return redirect()->action([\App\Http\Controllers\SchoolController::class, 'index'])->with('success', 'Deleted successfuly' );
    }

    public function getDataApi()
    {
        return School::all();
    }

    public function getDataId($id)
    {
        return school::findOrFail($id);
    }
}
