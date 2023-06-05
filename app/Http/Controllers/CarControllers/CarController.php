<?php

namespace App\Http\Controllers\CarControllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function show()
    {
        $cars = Car::all();

        return view('admin.cars.cars', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.add_car');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'marque' => ['required', 'max:255'],
            'model' => ['required', 'max:50'],
            'immatriculation' => ['required', 'max:255'],
            'year' => ['required', 'max:20'],
            'color' => ['required', 'max:255'],
            'kilometrage' => ['required', 'max:255'],
            'date_assurance' => ['required', 'max:255'],
            'etat' => ['required'],
        ]);

        $car = new Car;

        $car->marque = $request->marque;
        $car->model = $request->model;
        $car->immatriculation = $request->immatriculation;
        $car->year = $request->year;
        $car->color = $request->color;
        $car->kilometrage = $request->kilometrage;
        $car->date_assurance = $request->date_assurance;
        $car->etat = $request->etat;

        $car->save();

        return redirect('cars')->with('success', 'Car Created Successfully ^+^');
    }

    public function edit($id)
    {
        $cars = Car::findOrFail($id);

        if ($cars) {
            return view('admin.cars.update-cars', compact('cars'));
        } else {
            return redirect('cars')->with('not_found', 'This Not Found 404 ^+^');
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'marque' => ['required', 'max:255'],
            'model' => ['required', 'max:50'],
            'immatriculation' => ['required', 'max:255'],
            'year' => ['required', 'max:20'],
            'color' => ['required', 'max:255'],
            'kilometrage' => ['required', 'max:255'],
            'date_assurance' => ['required', 'max:255'],
            'etat' => ['required'],
        ]);

        $cars = Car::find($request->input('car_id'));

        if (!$cars) {
            return view('cars')->with('not_found', 'This Not Found 404 ^+^');
        } else {

            $cars->marque = $request->input('marque');
            $cars->model = $request->input('model');
            $cars->immatriculation = $request->input('immatriculation');
            $cars->year = $request->input('year');
            $cars->color = $request->input('color');
            $cars->kilometrage = $request->input('kilometrage');
            $cars->date_assurance = $request->input('date_assurance');
            $cars->etat = $request->input('etat');

            $cars->save();

            return redirect('cars')->with('cars_mod', 'Car Updated Successfully ^+^');
        }
    }

    public function delete(Request $request)
    {
        $car = Car::find($request->input('car_id'));

        if (!$car) {
            return back();
        } else {
            $car->delete();
            return redirect('cars')->with('car_destroy', 'Car Deleted Successfully ^+^');
        }
    }
}
