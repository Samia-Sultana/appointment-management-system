@extends('masterAdmin')
@section('appointment')
<div class="page-wrapper">
    <div class="row">
        <div class="col-lg-4">
            <form>
                @csrf
                <input type="date" id="search-input" name="date">
                <button type="button" id="search-button" class="searchSchedule">Search</button>
            </form>
        </div>
        <div class="col-lg-8">

            <table class="table">
                <thead>
                    <tr>

                        <th>Date</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Chember</th>
                        <th>Slot</th>
                        <th>Patients Allowed</th>
                        <th>Appointments</th>
                    </tr>
                </thead>
                <tbody id="scheduleResult">



                </tbody>
            </table>
        </div>

    </div>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Appointment Management Panel</h4>
                <h6>Create Appointment</h6>
            </div>
        </div>
    </div>



    <form action="{{route('admin.addAppointment')}}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">


                <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" id="date" class="date">
                            </div>
                        </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Chember</label>
                            <select class="select" name="chember" id="chember">
                                <option value="choose">choose...</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="row">
                    
                </div>
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
                                <input type="text" name="age" id="age">

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Problem Statement in Short</label>
                            <div class="pass-group">
                                <textarea type="text" name="problem" id="problem"></textarea>

                            </div>
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

<script src="{{ asset('//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js')}}"></script>
<script src="{{ asset('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js')}}"> </script>

<script type="text/Javascript">


    $(".searchSchedule").on("click", function() {
        var $select = $(this);
        var date = $select.prev("input#search-input").val();
        console.log(date);

        $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:"{{route('admin.searchSchedule')}}",
            data: {date:date},
            success:function(data){
                var schedule = JSON.parse(data.schedules);
                var appointments = JSON.parse(data.totalAppointments);
                var table = $("#scheduleResult");
                table.empty();
                $.each(schedule, function(index, item) {
            var row = $("<tr>");
            row.append($("<td>").text(date));
            row.append($("<td>").text(item.start_time));
            row.append($("<td>").text(item.end_time));
            row.append($("<td>").text(item.chember_id));
            row.append($("<td>").text(item.slotOnOff));
            row.append($("<td>").text(item.patients_allowed));
            var appointmentsForThatDateAndChember = appointments.filter( appointment =>{
                if(appointment.date == date && appointment.chember_id == item.chember_id){
                   return appointment; 
                }
            });
            row.append($("<td>").text(appointmentsForThatDateAndChember.length));
            table.append(row);
        });
            }
        });
        

    });


    $(".date").on("change", function() {
        var $select = $(this);
        var date = $select.val();
        console.log(date);

        $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:"{{route('admin.searchChember')}}",
            data: {date:date},
            success:function(data){
                var chembers = JSON.parse(data.chembers);
                var select = $("#chember");
                select.empty(); // remove existing options
                $.each(chembers, function(index, item) {
                var option = $("<option>").val(item.id).text(item.name);
                select.append(option);
        }); 
            }
        });
        

    });
    
    
    

</script>


@endsection