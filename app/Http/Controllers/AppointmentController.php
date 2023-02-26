<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Payment;
use App\Models\Schedule;
use App\Models\Special;
use App\Models\Patient;

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
        if($request['slotInput'] == null){
            $totalAppointmentsOfTheDay = Appointment::where('date' ,$request['date'] )->where('chember_id', $request['chember'] )->get();
            $serial =  count($totalAppointmentsOfTheDay) + 1;
        }
        else{
            $serial = $request['slotInput'];
        }
        

        Appointment::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'age' => $request['age'],
            'problem' => $request['problem'],
            'chember_id' => $request['chember'],
            'date' => $request['date'],
            'serial_no' => $serial,
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
        ->whereNull('deleted_at')->get();
      
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
        $totalAppointmentsOfTheDay = Appointment::where('date', $request->date)->get();
        if (count($specialSchedule) > 0) {
            return response()->json(['schedules' => json_encode($specialSchedule), 'totalAppointments' => json_encode($totalAppointmentsOfTheDay)]);
        } else {
            $dateInstance = Carbon::parse($request->date);
            $day = $dateInstance->format('l');
            $regularSchedule = Schedule::where('day', $day)->get();
            return response()->json(['schedules' => json_encode($regularSchedule), 'totalAppointments' => json_encode($totalAppointmentsOfTheDay)]);
        }
    }

    public function searchChember(Request $request)
    {
       
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
    public function cancelAppointment(Request $request)
    {
        $record = Appointment::findOrFail($request->appointment_id);
        $record->delete();

        return redirect()->route('admin.appointmentList');
    }

    public function cancelledAppointment()
    {

        $appointments = DB::table('appointments')
        ->join('chembers', 'appointments.chember_id', '=', 'chembers.id')
        ->select('appointments.*', DB::raw("chembers.name AS chember_name"))
        ->whereNotNull('appointments.deleted_at')->get();

        return view('admin.cancelledAppointmentList', compact('appointments'));
    }

    public function payVisit(Request $request){

        Payment::create([
            'appointment_id' => $request->appointment_id,
            'amount' => $request->amount,
        ]);

        Appointment::find($request->appointment_id)->update([
            'status' => "visited"
        ]);

        $patientData = Appointment::find($request->appointment_id);
        
        Patient::create([
            'patients_name' => $patientData->name,
            'patients_phone' => $patientData->phone,
        ]);
        
        return redirect()->route('admin.appointmentList');

    }
    public function searchSlot(Request $request){
        $specialSchedule = Special::where('date', $request->date)->where('chember_id', $request->chemberId)->get();
        $appointments = Appointment::where('date', $request->date)->where('chember_id', $request->chemberId)->get();

        if (count($specialSchedule) > 0) {
            return response()->json(['schedule' => json_encode($specialSchedule), 'appointments' => json_decode($appointments)]);
            
        } else {
            $dateInstance = Carbon::parse($request->date);
            $day = $dateInstance->format('l');
            $regularSchedule = Schedule::where('day', $day)->where('chember_id', $request->chemberId)->get();
            return response()->json(['schedule' => json_encode($regularSchedule), 'appointments' => json_decode($appointments)]);
            
        }
    

    }
    public function takeAppointment()
    {
        
        return view('takeAppointment');
    }

    public function userSearchChember(Request $request)
    {
       
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
    public function userSearchSlot(Request $request){
        $specialSchedule = Special::where('date', $request->date)->where('chember_id', $request->chemberId)->get();
        $appointments = Appointment::where('date', $request->date)->where('chember_id', $request->chemberId)->get();

        if (count($specialSchedule) > 0) {
            return response()->json(['schedule' => json_encode($specialSchedule), 'appointments' => json_decode($appointments)]);
            
        } else {
            $dateInstance = Carbon::parse($request->date);
            $day = $dateInstance->format('l');
            $regularSchedule = Schedule::where('day', $day)->where('chember_id', $request->chemberId)->get();
            return response()->json(['schedule' => json_encode($regularSchedule), 'appointments' => json_decode($appointments)]);
            
        }
    

    }
    public function userCreateAppointment(Request $request)
    {
        if($request['slotInput'] == null){
            $totalAppointmentsOfTheDay = Appointment::where('date' ,$request['date'] )->where('chember_id', $request['chember'] )->get();
            $serial =  count($totalAppointmentsOfTheDay) + 1;
        }
        else{
            $serial = $request['slotInput'];
        }
        

        Appointment::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'age' => $request['age'],
            'problem' => $request['problem'],
            'chember_id' => $request['chember'],
            'date' => $request['date'],
            'serial_no' => $serial,
        ]);

        
        return view('welcome');
    }

}
