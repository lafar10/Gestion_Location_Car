<?php

namespace App\Http\Controllers\FactureControllers;

use App\Models\Facture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class FactureController extends Controller
{
    public function show()
    {
        $factures = Facture::all();

        return view('admin.factures.factures', compact('factures'));
    }

    public function create()
    {
        return view('admin.factures.add-factures');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fullname' => ['required', 'max:255'],
            'fullname_a' => ['required', 'max:255'],
            'adress' => ['required', 'max:50'],
            'adress_a' => ['required', 'max:255'],
            'phone' => ['required', 'max:20'],
            'car_marque' => ['required', 'max:255'],
            'date_contract_debut' => ['required'],
            'date_contract_fin' => ['required'],
            'price' => ['required', 'max:255'],
            'oil_size' => ['required'],
            'passport_id' => ['required'],
            'etat' => ['required'],
        ]);

        $facture = new Facture;

        $facture->fullname = $request->fullname;
        $facture->fullname_a = $request->fullname_a;
        $facture->adress = $request->adress;
        $facture->adress = $request->adress;
        $facture->adress_a = $request->adress_a;
        $facture->phone = $request->phone;
        $facture->car_marque = $request->car_marque;
        $facture->date_contract_debut = $request->date_contract_debut;
        $facture->date_contract_fin = $request->date_contract_fin;
        $facture->price = $request->price;
        $facture->oil_size = $request->oil_size;
        $facture->passport_id = $request->passport_id;
        $facture->etat = $request->etat;

        $facture->save();

        return redirect('factures')->with('success', 'Facture Created Successfully ^+^');
    }

    public function edit($id)
    {
        $facture = Facture::findOrFail($id);

        if ($facture) {
            return view('admin.factures.update-facture', compact('facture'));
        } else {
            return redirect('factures')->with('not_found', 'This Not Found 404 ^+^');
        }
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'fullname' => ['required', 'max:255'],
            'fullname_a' => ['required', 'max:255'],
            'adress' => ['required', 'max:50'],
            'adress_a' => ['required', 'max:255'],
            'phone' => ['required', 'max:20'],
            'car_marque' => ['required', 'max:255'],
            'date_contract_debut' => ['required'],
            'date_contract_fin' => ['required'],
            'price' => ['required', 'max:255'],
            'oil_size' => ['required'],
            'passport_id' => ['required'],
            'etat' => ['required'],
        ]);

        $facture = Facture::findOrFail($request->input('facture_id'));

        if ($facture) {
            $facture->fullname = $request->fullname;
            $facture->fullname_a = $request->fullname_a;
            $facture->adress = $request->adress;
            $facture->adress_a = $request->adress_a;
            $facture->phone = $request->phone;
            $facture->car_marque = $request->car_marque;
            $facture->date_contract_debut = $request->date_contract_debut;
            $facture->date_contract_fin = $request->date_contract_fin;
            $facture->price = $request->price;
            $facture->oil_size = $request->oil_size;
            $facture->passport_id = $request->passport_id;
            $facture->etat = $request->etat;

            $facture->save();

            return redirect('factures')->with('success', 'Facture Updated Successfully ^+^');
        } else {
            return redirect('factures')->with('not_found', 'This Not Found 404 ^+^');
        }
    }

    public function destroy(Request $request)
    {
        $facture = Facture::find($request->input('facture_id'));

        if (!$facture) {
            return back();
        } else {
            $facture->delete();
            return redirect('factures')->with('facture_destroy', 'Facture Deleted Successfully ^+^');
        }
    }

    public function generatePDF($id)
    {
        $factures = Facture::find($id);

        if (!$factures)
            return back();


        $pdf = PDF::loadView('admin.factures.facturePdf', compact('factures'));
        $options = $pdf->getOptions();
        $options->setDefaultFont('Courier');
        return $pdf->download('facture.pdf');
    }
}
