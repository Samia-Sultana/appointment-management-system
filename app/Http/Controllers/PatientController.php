<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // view patient list for submit report
    public function index()
    {
        $patientData = Patient::all();

        return view('admin.addReport',compact('patientData'));
    }

    
}
