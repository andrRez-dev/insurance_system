<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct(){
        $this->carModel = new Car;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ownerModel = new Owner;
        $cars = $this->carModel->all();
        $possible_owners = $ownerModel->all();

        return view('cars', [
            'cars' => $cars,
            'possible_owners' => $possible_owners
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $req->validate([
            'reg_number' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'owner_id' => 'required|exists:owners,id'
        ]);

        $this->carModel->reg_number = $req->input('reg_number');
        $this->carModel->brand = $req->input('brand');
        $this->carModel->model = $req->input('model');
        $this->carModel->owner_id = $req->input('owner_id');

        $this->carModel->save();

        return redirect()->to('/cars');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $ownerModel = new Owner;
        $editingCar = $car;
        $owner = $car->owner;
        $possible_owners = $ownerModel->all();

        return view('car_edit', [
            'car' => $editingCar,
            'possible_owners' => $possible_owners,
            'owner' => $owner
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Car $car)
    {
        $req->validate([
            'reg_number' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'owner_id' => 'required|exists:owners,id'
        ]);

        $car->reg_number = $req->input('reg_number');
        $car->brand = $req->input('brand');
        $car->model = $req->input('model');
        $car->owner_id = $req->input('owner_id');

        $car->save();

        return redirect()->to('/cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $id = $car->id;
        $car->find($id)->delete();
        return redirect()->to('/cars');
    }
}
