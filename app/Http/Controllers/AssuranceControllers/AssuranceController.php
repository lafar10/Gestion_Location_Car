<?php

namespace App\Http\Controllers\AssuranceControllers;

use App\Models\Assurance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssuranceController extends Controller
{
    public function show()
    {
        $assurances = Assurance::all();
        return view('admin.assurance.assurance',compact('assurances'));
    }

    public function create()
    {
        return view('admin.assurance.add-assurance');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fullname' => ['required', 'max:255'],
            'marque' => ['required', 'max:255'],
            'model' => ['required', 'max:50'],
            'immatriculation' => ['required', 'max:255'],
            'year' => ['required', 'max:20'],
            'color' => ['required', 'max:255'],
            'date_assurance_debut' => ['required'],
            'date_assurance_fin' => ['required'],
            'price' => ['required', 'max:255'],
            'period' => ['required'],
            'type_assurance' => ['required'],
            'etat' => ['required'],
        ]);

        $assurance = new Assurance;

        $assurance->fullname = $request->fullname;
        $assurance->marque = $request->marque;
        $assurance->model = $request->model;
        $assurance->immatriculation = $request->immatriculation;
        $assurance->year = $request->year;
        $assurance->color = $request->color;
        $assurance->date_assurance_debut = $request->date_assurance_debut;
        $assurance->date_assurance_fin = $request->date_assurance_fin;
        $assurance->price = $request->price;
        $assurance->period = $request->period;
        $assurance->type_assurance = $request->type_assurance;
        $assurance->etat = $request->etat;

        $assurance->save();

        return redirect('assurances')->with('success', 'Assurance Created Successfully ^+^');

    }

    public function edit($id)
    {
        $assurances = Assurance::findOrFail($id);

        if ($assurances) {
            return view('admin.assurance.update-assurance', compact('assurances'));
        } else {
            return redirect('assurances')->with('not_found', 'This Not Found 404 ^+^');
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'fullname' => ['required', 'max:255'],
            'marque' => ['required', 'max:255'],
            'model' => ['required', 'max:50'],
            'immatriculation' => ['required', 'max:255'],
            'year' => ['required', 'max:20'],
            'color' => ['required', 'max:255'],
            'date_assurance_debut' => ['required'],
            'date_assurance_fin' => ['required'],
            'price' => ['required', 'max:255'],
            'period' => ['required'],
            'type_assurance' => ['required'],
            'etat' => ['required'],
        ]);

        $assurance = Assurance::find($request->input('assurance_id'));

        if (!$assurance) {
            return view('assurances')->with('not_found', 'This Not Found 404 ^+^');
        } else {

        $assurance->fullname = $request->fullname;
        $assurance->marque = $request->marque;
        $assurance->model = $request->model;
        $assurance->immatriculation = $request->immatriculation;
        $assurance->year = $request->year;
        $assurance->color = $request->color;
        $assurance->date_assurance_debut = $request->date_assurance_debut;
        $assurance->date_assurance_fin = $request->date_assurance_fin;
        $assurance->price = $request->price;
        $assurance->period = $request->period;
        $assurance->type_assurance = $request->type_assurance;
        $assurance->etat = $request->etat;

        $assurance->save();

        return redirect('assurances')->with('success', 'Assurance Updated Successfully ^+^');
        }
    }


    public function delete(Request $request)
    {
        $assurance = Assurance::find($request->input('assurance_id'));

        if (!$assurance) {
            return back();
        } else {
            $assurance->delete();
            return redirect('assurances')->with('assurance_destroy', 'Assurance Deleted Successfully ^+^');
        }
    }
}
