<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\contacts;

class contactsController extends Controller
{

    public function index()
    {
        return view('contacts.index' , [
            'contacts' => contacts::all()
        ]);
    }


    public function create()
    {
        return view('contacts.create');
    }


    public function store(Request $request)
    {
        $contacts = new contacts();

$contacts->save();
return redirect()->action([\App\Http\Controllers\contactsController::class, 'index'])->with('success', 'successfuly' );
    }


    public function show($id)
    {
        return view('contacts.show' , [
            'contacts' => contacts::findOrFail($id)
        ]);
    }


    public function edit($id)
    {
        return view('contacts.edit' , [
            'contacts' => contacts::findOrFail($id)
        ]);
    }


    public function update(Request $request, $id)
    {
        $contacts = new contacts();
$contacts = contacts::findOrFail($id);
$contacts->save();
return redirect()->action([\App\Http\Controllers\contactsController::class, 'index'])->with('success', 'successfuly' );
    }


    public function destroy($id)
    {
        $to_delet = contacts::findOrFail($id);
$to_delet->delete();
        return redirect()->action([\App\Http\Controllers\contactsController::class, 'index'])->with('success', 'Deleted successfuly' );
    }
}
