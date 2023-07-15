<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('Employee.vehicle.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employee.vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStore($request);
        $data = $request->all();

        $data['equipment'] = implode(',', $request->equipment);
        $images = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                if ($image) {
                    $name = $image->getClientOriginalName(); // Get the original name of the file
                    $destination = public_path('/vehicles_images');
                    $image->move($destination, $name);
                    $images[] = $name;
                }
            }

            if (!empty($images)) {
                $data['image'] = implode(',', $images);
            }
        }


        if (count($images) === 0) {
            return redirect()->back()->with(['error' => 'Veuillez sélectionner au moins une image.']);
        } else {
            Vehicle::create($data);
            return redirect()->back()->with('message', "Véhicule d'occasion créé");
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        return view('Employee.vehicle.delete', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        return view('Employee.vehicle.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateUpdate($request);
        $data = $request->all();
        $vehicle = Vehicle::findOrFail($id);
        $images = [];

        if ($request->hasFile('image')) {


            foreach ($request->file('image') as $image) {
                if ($image) {
                    $name = $image->getClientOriginalName();
                    $destination = public_path('/vehicles_images');
                    $image->move($destination, $name);
                    $images[] = $name;
                }
            }

            if (!empty($images)) {

                // Delete the previous images from the directory
                foreach (explode(',', $vehicle->image) as $prevImage) {
                    unlink(public_path('vehicles_images/' . $prevImage));
                }

                // Store the new image filenames in the database
                $vehicle->update(['image' => '']);
                $data['image'] = implode(',', $images);
            }
        }

        $vehicle->update($data);
        return redirect()->back()->with('message', "Véhicule d'occasion mis à jour");
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicleDelete = $vehicle->delete();

        if ($vehicleDelete) {

            foreach (explode(',', $vehicle->image) as $prevImage) {
                unlink(public_path('vehicles_images/' . $prevImage));
            }
        }

        return redirect()->route('vehicle.index')->with('message', 'vehicle supprimé avec succès');
    }

    public function validateStore($request)
    {
        return $this->validate($request, [
            'brand' => 'required',
            'model' => 'required',
            'fiscalPower' => 'required',
            'price' => 'required',
            'releaseYear' => 'required',
            'energy' => 'required',
            'mileage' => 'required',
            'gearbox' => 'required',
            'description' => 'required',
            'image.*' => 'required|file|mimes:jpeg,jpg,png',
        ]);
    }

    public function validateUpdate($request)
    {
        return $this->validate($request, [
            'brand' => 'required',
            'model' => 'required',
            'fiscalPower' => 'required',
            'price' => 'required',
            'releaseYear' => 'required',
            'energy' => 'required',
            'mileage' => 'required',
            'gearbox' => 'required',
            'description' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png',
        ]);
    }
}
