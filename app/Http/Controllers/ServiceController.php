<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('Admin.service.index', compact('services'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.service.create');
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
        $name = (new Service)->serviceIMG($request);

        $data['image'] = $name;
        Service::create($data);
        return redirect()->back()->with('message', 'Service ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        return view('Admin.service.delete', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('Admin.service.edit', compact('service'));
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
        $this->validateUpdate($request, $id);
        $data = $request->all();
        $service = Service::find($id);
        $imageName = $service->image;
        if ($request->hasFile('image')) {
            $imageName = (new Service)->serviceIMG($request);
            unlink(public_path('services_images/' . $service->image));
        }
        $data['image'] = $imageName;
        $service->update($data);
        return redirect()->route('service.index')->with('message', 'Service mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $service = Service::find($id);
        $serviceDelete = $service->delete();
        if ($serviceDelete) {
            unlink(public_path('services_images/' . $service->image));
        }

        return redirect()->route('service.index')->with('message', 'Service supprimé avec succès');
    }

    public function validateStore($request)
    {
        return $this->validate($request, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png'



        ]);
    }

    public function validateUpdate($request, $id)
    {
        return $this->validate($request, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png',

        ]);
    }
}
