<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

use Image;

class ReportController extends Controller
{
    
    public function addReportView($id)
    {
        $reportFile = Report::where('patients_id','=',$id)->get();

        return view('admin.addReportImageView',compact('id','reportFile'));
    }

    public function saveMultipleReport(Request $request)
    {
        $report_photo = array();

        if($files = $request->file('report_photo')){

            foreach($files as $file){
                
                $name_gen = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
                Image::make($file)->save('upload/report_image/'.$name_gen);
                $save_url = 'upload/report_image/'.$name_gen;

                $report_photo[] = $save_url;

            }
        }

        Report::create([
            'patients_id' => $request->patients_id,
            'report_photo' => implode('|', $report_photo),

        ]);

        return back();
   
    }

    public function patientReportDetails($id)
    {
        $reportImage = Report::find($id);
        $reportImages = explode('|',$reportImage->report_photo);

        return view('admin.patientReportDetails',compact('reportImages'));
    }

    
}
