<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Schedule;
use App\Models\Special;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Appointment::class);
        return view('admin.createAppointment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Appointment::class);

        Appointment::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'age' => $request['age'],
            'problem' => $request['problem'],
            'chember_id' => $request['chember'],
            'date' => $request['date'],
        ]);
        return redirect()->route('admin.appointmentPage');
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
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        $this->authorize('viewAny', Appointment::class);

        $appointments = DB::table('appointments')
        ->join('chembers', 'appointments.chember_id', '=', 'chembers.id')
        ->select('appointments.*', DB::raw("chembers.name AS chember_name"))
        ->get();
      
        return view('admin.appointmentList', compact('appointments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    public function searchSchedule(Request $request)
    {
        //$this->authorize('create', Appointment::class);

        $specialSchedule = Special::where('date', $request->date)->get();
        if (count($specialSchedule) > 0) {
            return response()->json(['schedules' => json_encode($specialSchedule)]);
        } else {
            $dateInstance = Carbon::parse($request->date);
            $day = $dateInstance->format('l');
            $regularSchedule = Schedule::where('day', $day)->get();
            return response()->json(['schedules' => json_encode($regularSchedule)]);
        }
    }

    public function searchChember(Request $request)
    {
        //$this->authorize('create', Appointment::class);
        $specialSchedule = DB::table('specials')
            ->join('chembers', 'specials.chember_id', '=', 'chembers.id')
            ->select('specials.date', 'chembers.id', 'chembers.name')
            ->where('specials.date', "=", $request->date)
            ->get();
        if (count($specialSchedule) > 0) {

            return response()->json(['chembers' => json_encode($specialSchedule)]);
        } else {
            $dateInstance = Carbon::parse($request->date);
            $day = $dateInstance->format('l');

            $regularSchedule = DB::table('schedules')
                ->join('chembers', 'schedules.chember_id', '=', 'chembers.id')
                ->select('schedules.day', 'chembers.id', 'chembers.name')
                ->where('schedules.day', "=", $day)
                ->get();
            return response()->json(['chembers' => json_encode($regularSchedule)]);
        }
    }
}
