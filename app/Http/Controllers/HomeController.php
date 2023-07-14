<?php

namespace App\Http\Controllers;

use App\Models\OpeningHours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\Testimony;
use App\Models\User;
use App\Models\Vehicle;

class HomeController extends Controller
{

    public function index()
    {
        $services = Service::all();
        $users = User::all();
        $openingHours = OpeningHours::orderBy('day_id')->get();
        $vehicles = Vehicle::all();
        $testimonies = Testimony::all();


        return view('home.home', compact('services', 'users', 'openingHours', 'vehicles', 'testimonies'));
    }

    public function details($id)
    {
        $vehicle = Vehicle::find($id);
        $openingHours = OpeningHours::orderBy('day_id')->get();
        return view('home.details', compact('vehicle', 'openingHours'));
    }

    public function store(Request $request)
    {
        $this->validateStore($request);
        $data = $request->all();

        Testimony::create($data);
        return redirect()->back()->with('message', 'Témoignage soumis avec succès !');
    }

    public function validateStore($request)
    {
        return $this->validate($request, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'comment' => 'required',
            'rating' => 'required|integer|min:1|max:5'

        ]);
    }
}
