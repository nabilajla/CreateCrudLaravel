<?php

namespace App\Http\Controllers;

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

    $Nabil->id = $request->input('id');
    $Nabil->Name = $request->input('Name');
    $Nabil->created_at = $request->input('created_at');
    $Nabil->updated_at = $request->input('updated_at');
    $Nabil->save();
        return redirect()->action([Nabil::class, 'index'])->with('Success', 'successfuly' );
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
$Nabil->id = $request->input('id');
$Nabil->Name = $request->input('Name');
$Nabil->created_at = $request->input('created_at');
$Nabil->updated_at = $request->input('updated_at');
$Nabil->save();
return redirect()->action([Nabil::class, 'index'])->with('Success', 'successfuly' );
    }


    public function destroy($id)
    {
        $to_delet = Nabil::findOrFail($id);
$to_delet->delete(); 
        return redirect()->route('Nabil.index');
    }
}
