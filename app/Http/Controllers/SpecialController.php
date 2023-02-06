<?php

namespace App\Http\Controllers;

use App\Models\Special;
use Illuminate\Http\Request;

class SpecialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.createSpecialSchedule');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Special::create([
            'date' => $request->date,
            'chember_id' => $request->chember,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'patients_allowed' => $request->patients_allowed,
            'slotOnOff' => $request->slot

        ]);
        return redirect()->route('admin.specialPage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Special  $special
     * @return \Illuminate\Http\Response
     */
    public function show(Special $special)
    {
        $schedules = Special::all();
        return view('admin.specialScheduleList', compact('schedules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Special  $special
     * @return \Illuminate\Http\Response
     */
    public function edit(Special $special)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Special  $special
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Special $special)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Special  $special
     * @return \Illuminate\Http\Response
     */
    public function destroy(Special $special)
    {
        //
    }
}
