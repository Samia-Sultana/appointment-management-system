@extends('masterAdmin')
@section('reportImageView')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Report Upload</h4>
                <h6>Add Report</h6>
            </div>
        </div>

        <form  method="POST" action="{{ route('admin.saveMultipleReportImage') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                
                                <input type="text" name="patients_id" id="patients_id" value="{{$id}}" hidden>

                                <label>Report Photo</label>
                                <input type="file" name="report_photo[]" multiple id="report_photo">
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <button type="submit">Submit</a>

                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<div class="page-wrapper">
    <div class="content">
        <div class="row">

        @if(!empty($reportFile))
        @foreach($reportFile as $datafile)

            <div class="col-md-2">
                <h4>{{ $datafile->created_at->format('d-m-Y') }}</h4>
                
                    <div style="width:100px; height:130px; display:flex; align-items:center; justify-content:center; border: 2px solid #000;">
                    <a href="{{ route('admin.patientReportDetails',$datafile->id) }}">
                    <i class="fas fa-eye" style="font-size:36px; color:#000;"></i>
                    </a>
                    </div>
                

            </div>

        @endforeach
        @endif
             
        </div>
    </div>
</div>

@endsection