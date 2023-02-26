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
                <div class="row d-flex flex-row" id = "slot-view">




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
                var choose = $("<option>").val('choose').text('Choose...');
                select.append(choose);
                $.each(chembers, function(index, item) {
                var option = $("<option>").val(item.id).text(item.name);
                select.append(option);

                

        }); 
            }
        });


        
        

    });

    $(function() {
        //event bubbling concept
    $('body').on('change', '#chember', function() {
        var slotView = $(this).parents('.row').next('#slot-view');
        slotView.empty();

    const chemberId = $(this).val();
    const date = $(this).parents('.row').find('input#date').val();

    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:"{{route('admin.searchSlot')}}",
            data: {date:date, chemberId:chemberId},
            success:function(data){
                var schedule = JSON.parse(data.schedule);
                console.log(schedule);
            
               if(schedule[0].slotOnOff == 'withSlot'){
                
                let serialNumbers = data.appointments.map(item => parseInt(item.serial_no));
                console.log(serialNumbers);
                let startTimeArray = schedule[0].start_time.split(":");
                let startTime = new Date();
                startTime.setHours(startTimeArray[0]);
                startTime.setMinutes(startTimeArray[1]);
                let endTimeArray = schedule[0].end_time.split(":");
                let endTime = new Date();
                endTime.setHours(endTimeArray[0]);
                endTime.setMinutes(endTimeArray[1]);
                let durationMs = endTime - startTime;
                let durationMinutes = Math.floor(durationMs / 60000); // 1 minute = 60000 milliseconds
                var slots = Math.ceil(durationMinutes / schedule[0].patients_allowed);
                

                
                for(var i = 0;i<slots ; i++){
                       
                let outerDiv = document.createElement('div');
                outerDiv.className = 'col-lg-3 col-sm-6 col-12';

                let innerDiv = document.createElement('div');
                innerDiv.className = 'form-group';

                let inputTag = document.createElement('input');
                inputTag.setAttribute('type', 'radio');
                inputTag.setAttribute('name', 'slotInput');
                inputTag.setAttribute('value', i+1 );
                if(serialNumbers.includes(i+1)){
                    
                    inputTag.setAttribute('disabled', 'disabled');
                    innerDiv.style.backgroundColor = 'red';
                }
               


                var slotTime = durationMinutes/slots;
                var slotStart = new Date(startTime.getTime() + slotTime * i * 60000);
                var slotEnd = new Date(startTime.getTime() + (slotTime * (i + 1) * 60000));

                var slotStartStr = slotStart.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                var slotEndStr = slotEnd.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                let label = document.createElement("label");
                label.innerText = slotStartStr + '-' + slotEndStr ;
                
                innerDiv.appendChild(inputTag);
                innerDiv.appendChild(label);

                //innerDiv.appendChild(label);
                outerDiv.appendChild(innerDiv);
                let container = document.getElementById("slot-view");
                container.appendChild(outerDiv);

                    
                    

                }
               

               }

            }
                
                

        }); 

    
  });
});

    
    
    
    

</script>
<script>





</script>


@endsection