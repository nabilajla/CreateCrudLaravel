<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\contact;

class contactController extends Controller
{

    public function index()
    {
        return view('contact.index' , [
            'contact' => contact::all()
        ]);
    }


    public function create()
    {
        return view('contact.create');
    }


    public function store(Request $request)
    {
        $contact = new contact();

$contact->Name = $request->input('Name');
$contact->Phone = $request->input('Phone');
$contact->Email = $request->input('Email');
$contact->save();
return redirect()->action([\App\Http\Controllers\contactController::class, 'index'])->with('success', 'successfuly' );
    }


    public function show($id)
    {
        return view('contact.show' , [
            'contact' => contact::findOrFail($id)
        ]);
    }

 
    public function edit($id)
    {
        return view('contact.edit' , [
            'contact' => contact::findOrFail($id)
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $contact = new contact();
$contact = contact::findOrFail($id);
$contact->Name = $request->input('Name');
$contact->Phone = $request->input('Phone');
$contact->Email = $request->input('Email');
$contact->save();
return redirect()->action([\App\Http\Controllers\contactController::class, 'index'])->with('success', 'successfuly' );
    }


    public function destroy($id)
    {
        $to_delet = contact::findOrFail($id);
$to_delet->delete();
        return redirect()->action([\App\Http\Controllers\contactController::class, 'index'])->with('success', 'Deleted successfuly' );
    }
}
