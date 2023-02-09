@extends('masterAdmin')
@section('patientReportDetails')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Report View</h4>
                
            </div>
        </div>

    </div>
</div>

<div class="page-wrapper">
    <div class="content">
        <div class="row">

        @if(!empty($reportImages))
        @foreach($reportImages as $dataIamges)

            <div class="col-md-2">
                
                
                    <div style="width:100px; height:130px; display:flex; align-items:center; justify-content:center; border: 2px solid #000;">
                    <a href="{{URL::to($dataIamges)}}"> <img src="{{URL::to($dataIamges)}}" alt="" style="width:100px; height:130px;"></a>
                   
                    </div>
                

            </div>

        @endforeach
        @endif
             
        </div>
    </div>
</div>

@endsection