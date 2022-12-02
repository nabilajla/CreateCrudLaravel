<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Nabil;

class NabilController extends Controller
{

    public function index()
    {
        return view('Nabil.index' , [
            'Nabil' => Nabil::all()
        ]);
    }


    public function create()
    {
        return view('Nabil.create');
    }


    public function store(Request $request)
    {
        $Nabil = new Nabil();

$Nabil->Name = $request->input('Name');
$Nabil->save();
return redirect()->action([\App\Http\Controllers\NabilController::class, 'index'])->with('success', 'successfuly' );
    }


    public function show($id)
    {
        return view('Nabil.show' , [
            'Nabil' => Nabil::findOrFail($id)
        ]);
    }


    public function edit($id)
    {
        return view('Nabil.edit' , [
            'Nabil' => Nabil::findOrFail($id)
        ]);
    }


    public function update(Request $request, $id)
    {
        $Nabil = new Nabil();
$Nabil = Nabil::findOrFail($id);
$Nabil->Name = $request->input('Name');
$Nabil->save();
return redirect()->action([\App\Http\Controllers\NabilController::class, 'index'])->with('success', 'successfuly' );
    }


    public function destroy($id)
    {
        $to_delet = Nabil::findOrFail($id);
$to_delet->delete();
        return redirect()->action([\App\Http\Controllers\NabilController::class, 'index'])->with('success', 'Deleted successfuly' );
    }
}
