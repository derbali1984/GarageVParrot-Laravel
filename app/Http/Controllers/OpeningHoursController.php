<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpeningHours;
use App\Models\Day;
use Illuminate\Support\Arr;

class OpeningHoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $openingHours = OpeningHours::with('day')->orderBy('day_id')->get();
        return view('Admin.openingHours.index', compact('openingHours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.openingHours.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'day' => 'required',
            'time_morning' => 'nullable|array',
            'time_afternoon' => 'nullable|array',
        ]);

        $dayName = $validatedData['day'];
        $day = Day::where('name', $dayName)->first();

        $existingOpeningHours = OpeningHours::where('day_id', $day->id)->first();
        if ($existingOpeningHours) {
            return redirect()->back()->with('error', "Les heures d'ouverture pour ce jour existent déjà.");
        }

        // Combine the selected morning and afternoon time slots
        $timeMorning = Arr::get($validatedData, 'time_morning', []);
        $timeAfternoon = Arr::get($validatedData, 'time_afternoon', []);

        // Check if there is only one selected time slot for either morning or afternoon
        if ((count($timeMorning) == 1) || (count($timeAfternoon) == 1)) {
            return redirect()->back()->with('error', "Veuillez sélectionner plus d'une plage horaire pour le matin ou l'après-midi.");
        }

        // Separate morning and afternoon time slots
        $morningTimeSlots = [];
        $afternoonTimeSlots = [];

        foreach ($timeMorning as $time) {
            $morningTimeSlots[] = $time;
        }

        foreach ($timeAfternoon as $time) {
            $afternoonTimeSlots[] = $time;
        }

        // Generate the time value for morning time slots
        $morningTime = '';
        if (!empty($morningTimeSlots)) {
            $morningStart = reset($morningTimeSlots);
            $morningEnd = end($morningTimeSlots);
            $morningTime = $morningStart . ' - ' . $morningEnd;
        }

        // Generate the time value for afternoon time slots
        $afternoonTime = '';
        if (!empty($afternoonTimeSlots)) {
            $afternoonStart = reset($afternoonTimeSlots);
            $afternoonEnd = end($afternoonTimeSlots);
            $afternoonTime = $afternoonStart . ' - ' . $afternoonEnd;
        }

        // Combine the morning and afternoon time values
        $time = 'Fermé';
        if (!empty($morningTime) && !empty($afternoonTime)) {
            $time = $morningTime . ', ' . $afternoonTime;
        } elseif (!empty($morningTime)) {
            $time = $morningTime;
        } elseif (!empty($afternoonTime)) {
            $time = $afternoonTime;
        }

        // Store the opening hours record
        OpeningHours::create([
            'day_id' => $day->id,
            'time' => $time,
        ]);

        return redirect()->back()->with('message', "Heures d'ouverture créées avec succès !");
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $openingHour = OpeningHours::find($id);
        return view('Admin.openingHours.edit', compact('openingHour'));
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
        // Validate the form input
        $validatedData = $request->validate([
            'time_morning' => 'nullable|array',
            'time_afternoon' => 'nullable|array',
        ]);

        // Find the opening hour record
        $openingHour = OpeningHours::find($id);
        if (!$openingHour) {
            return redirect()->back()->with('error', 'Les heures d\'ouverture spécifiées n\'existent pas.');
        }

        // Combine the selected morning and afternoon time slots
        $timeMorning = Arr::get($validatedData, 'time_morning', []);
        $timeAfternoon = Arr::get($validatedData, 'time_afternoon', []);

        // Check if there is only one selected time slot for either morning or afternoon
        if ((count($timeMorning) == 1) || (count($timeAfternoon) == 1)) {
            return redirect()->back()->with('error', "Veuillez sélectionner plus d'une plage horaire pour le matin ou l'après-midi.");
        }

        // Separate morning and afternoon time slots
        $morningTimeSlots = [];
        $afternoonTimeSlots = [];

        foreach ($timeMorning as $time) {
            $morningTimeSlots[] = $time;
        }

        foreach ($timeAfternoon as $time) {
            $afternoonTimeSlots[] = $time;
        }

        // Generate the time value for morning time slots
        $morningTime = '';
        if (!empty($morningTimeSlots)) {
            $morningStart = reset($morningTimeSlots);
            $morningEnd = end($morningTimeSlots);
            $morningTime = $morningStart . ' - ' . $morningEnd;
        }

        // Generate the time value for afternoon time slots
        $afternoonTime = '';
        if (!empty($afternoonTimeSlots)) {
            $afternoonStart = reset($afternoonTimeSlots);
            $afternoonEnd = end($afternoonTimeSlots);
            $afternoonTime = $afternoonStart . ' - ' . $afternoonEnd;
        }

        // Combine the morning and afternoon time values
        $time = 'Fermé';
        if (!empty($morningTime) && !empty($afternoonTime)) {
            $time = $morningTime . ', ' . $afternoonTime;
        } elseif (!empty($morningTime)) {
            $time = $morningTime;
        } elseif (!empty($afternoonTime)) {
            $time = $afternoonTime;
        }

        // Update the opening hours record
        $openingHour->time = $time;
        $openingHour->save();

        return redirect()->back()->with('message', "Heures d'ouverture mises à jour avec succès !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
