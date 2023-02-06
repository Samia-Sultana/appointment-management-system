@extends('masterAdmin')
@section('schedule')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>schedule Management</h4>
                <h6>Add/Update schedule</h6>
            </div>
        </div>

        <form action="{{route('admin.addSchedule')}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Day</label>
                                <select name="day" id="day">
                                    <option value="saturday">saturday</option>
                                    <option value="sunday">sunday</option>
                                    <option value="monday">monday</option>
                                    <option value="tuesday">tuesday</option>
                                    <option value="wednesday">wednesday</option>
                                    <option value="thursday">thursday</option>
                                    <option value="friday">friday</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Chember</label>
                                <select name="chember" id="chember">
                                    <?php
                                    $chembers = App\Models\Chember::all();
                                    ?>
                                    @foreach($chembers as $chember)
                                    <option value="{{$chember->id}}">{{$chember->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Start Time</label>
                                <input type="time" name="start_time" id="start_time">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>End Time</label>
                                <input type="time" name="end_time" id="end_time">
                            </div>
                        </div>

                      

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Slot</label>
                                <select name="slot" id="slot">
                                    <option value="withSlot">With slot</option>
                                    <option value="withoutSlot">Without slot</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Total patients to see</label>
                                <input type="text" name="patients_allowed" id="patients_allowed">
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

@endsection