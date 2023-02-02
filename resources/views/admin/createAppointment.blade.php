@extends('masterAdmin')
@section('appointment')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Appointment Management Panel</h4>
                <h6>Create Appointment</h6>
            </div>
        </div>

        <form action="{{route('admin.addAppointment')}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="name" id="name">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" id="phone">
                            </div>
                        </div>


                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Age</label>
                                <div class="pass-group">
                                    <input type="text"  name="age" id="age">
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Problem Statement in Short</label>
                                <div class="pass-group">
                                    <textarea type="text"  name="problem" id="problem"></textarea>
                                    
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Chember</label>
                                <?php
                                $chembers = App\Models\Chember::all();
                                ?>
                                <select class="select" name="chember" id="chember">
                                    @if(count($chembers) >0)
                                    @foreach($chembers as $chember)
                                    <option value="{{$chember->id}}">{{$chember->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" id="date">
                            </div>
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