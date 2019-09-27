@extends('layouts.room-reservation-app')
@section('container')
@include('modal-content')
<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            {{-- <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Calendar</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Apps</li>
                        <li class="breadcrumb-item active">Calendar</li>
                    </ol>
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>          
            </div> --}}
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="col-md-2  pull-left">
                   @include('left-content')
                </div>

                <div class="col-md-10 pull-left">
                        @include('notifications.success')
                        @include('notifications.error')
                    <div class="card">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="nav-item"> <a style="font-size: 12.5px; font-weight: bold; color:#1976d2" class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">ALL</span></a> </li>
                            
                                <li class="nav-item"> 
                                <a style="font-size: 12.5px; font-weight: bold; color:#f00001" class="nav-link" data-toggle="tab" href="#6th-street" role="tab" aria-expanded="false">
                                    <span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">
                                    <i class="fa fa-circle" style="font-size: 10px; color: #f00001"></i> 6TH STREET</span></a> 
                                </li>

                                <li class="nav-item"> 
                                    <a style="font-size: 12.5px; font-weight: bold; color: #222222" class="nav-link" data-toggle="tab" href="#lake-austine" role="tab" aria-expanded="false">
                                        <span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">
                                            <i class="fa fa-circle" style="font-size: 10px; color: #222222"></i> LAKE AUSTIN</span></a> 
                                </li>

                                <li class="nav-item"> 
                                    <a style="font-size: 12.5px; font-weight: bold; color: #f5b903" class="nav-link" data-toggle="tab" href="#long-horn" role="tab" aria-expanded="false">
                                        <span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">
                                        <i class="fa fa-circle" style="font-size: 10px; color: #f5b903"></i> LONGHORN</span></a> 
                                </li>

                                <li class="nav-item"> 
                                    <a style="font-size: 12.5px; font-weight: bold; color: #20710a" class="nav-link" data-toggle="tab" href="#manchaca" role="tab" aria-expanded="false">
                                            <span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">
                                        <i class="fa fa-circle" style="font-size: 10px; color: #20710a"></i> MANCHACA</span></a> 
                                </li>

                                <li class="nav-item"> 
                                    <a style="font-size: 12.5px; font-weight: bold; color: #001c80" class="nav-link" data-toggle="tab" href="#pecan" role="tab" aria-expanded="false">
                                        <span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">
                                        <i class="fa fa-circle" style="font-size: 10px; color: #001c80"></i> PECAN</span></a> 
                                </li>

                                <li class="nav-item"> 
                                        <a style="font-size: 12.5px; font-weight: bold; color: #ff69b4" class="nav-link" data-toggle="tab" href="#stevie-ray" role="tab" aria-expanded="false">
                                        <span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">
                                    <i class="fa fa-circle" style="font-size: 10px; color: #ff69b4"></i> STEVIE RAY</span></a> 
                                </li>

                                <li class="nav-item"> 
                                        <a style="font-size: 12.5px; font-weight: bold; color: #36024d" class="nav-link" data-toggle="tab" href="#taj-mahal" role="tab" aria-expanded="false">
                                        <span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">
                                    <i class="fa fa-circle" style="font-size: 10px; color: #36024d"></i> TAJ MAHAL</span></a> 
                                </li>

                                <li class="nav-item"> 
                                        <a style="font-size: 12.5px; font-weight: bold; color: #ff8040" class="nav-link" data-toggle="tab" href="#the-oasis" role="tab" aria-expanded="false">
                                        <span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">
                                    <i class="fa fa-circle" style="font-size: 10px; color: #ff8040"></i> THE OASIS</span></a> 
                                </li>
                           </ul>
                            <!-- Tab panes -->
                            <div class="tab-content br-n pn">
                                <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
                                   <div class="card-body calender-sidebar">
                                        <div id="calendarAll"></div>
                                    </div>
                                </div>
                            
                            
                            </div>
                        </div>
                    </div>
                </div>


                
               
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                {{-- @include('layouts.partials.right-menu') --}}
                <!-- ============================================================== -->


 <!-- ALL EVENT MODAL  -->
 <div id="calendarModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <div id="modalBody" class="modal-body"> </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>

 <div class="modal none-border" id="my-event-all">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #04b381">
                {{-- <h4 class="modal-title"><strong>Add Event</strong></h4> --}}
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button> --}}
            </div>
        </div>
    </div>
</div>

<!-- END MODAL -->
<script>
var defaultEvents =  [
                        
                        @foreach($events as $event)    
                            {        
                               
                                title: "{{strtoupper($event->title)}}",
                                borderColor: "@if($event->theRoom){{$event->theRoom->color_code}}@endif",
                  
                                start: "{{ \Carbon\Carbon::parse($event->start)->format('Y-m-d H:i')}} ",
                                end: "{{ \Carbon\Carbon::parse($event->end)->format('Y-m-d H:i') }}",
                                location: "@if($event->theRoom){{ucwords($event->theRoom->room)}}@endif",
                                remarks: "{{$event->remarks}} {{ \Carbon\Carbon::parse($event->start)->format('Y-m-d H:i')}} - {{ \Carbon\Carbon::parse($event->end)->format('Y-m-d H:i') }}",
                                createdBy: "@if($event->theCreator){{$event->theCreator->fullname}}@endif",
                                backgroundColor: "@if($event->theRoom){{$event->theRoom->color_code}}@endif",
                                @isset( $event->repeatUntil)
                                <?php $rep = str_split($event->repeatDay);?>
                                dow: [ {{implode(",",$rep)}} ]  , // Repeat monday and thursday    
                                dowstart: new Date("{{ \Carbon\Carbon::parse($event->start)->format('Y/m/d')}}"),
                                dowend: new Date("{{ \Carbon\Carbon::parse($event->repeatUntil)->format('Y/m/d')}}")
                                @endisset
                         
                            },
                        @endforeach 
                      ];
$(document).ready(function() {
  $('#calendarAll').fullCalendar({
  
        eventRender: function(event, element, view) {

        var theDate = event.start
        var endDate = event.dowend;
		var startDate = event.dowstart;
        
        if (theDate >= endDate) {
                return false;
        }

        if (theDate <= startDate) {
          return false;
        }
        
        },
        nextDayThreshold: '00:00:00',
        timezone : 'local',
        defaultView: 'month',
        eventLimit: true,
        views: {
            month: {
            eventLimit: 5,
            eventLimitText: "events"
            }
        },
        selectable: true,
        header: {
        left: 'prev,next today',
  			center: 'title',
  			right: 'month,agendaWeek,agendaDay'
        },
        // defaultDate: '2016-01-15T16:00:00',


        
        events: defaultEvents,
        eventClick:  function(event, jsEvent, view) {
            $('#modalTitle').html(event.title);
            $('#modalBody').html(event.remarks);
            // $('#eventUrl').attr('href',event.url);
            $('#calendarModal').modal();
        },
 
  })
});</script>
<script>


// document.querySelector("#untilDate").addEventListener("click", function() {
//   invoiceDate = $('#start_date').val();
//   console.log(invoiceDate);
//   var days = 30// Number(document.querySelector("#days").value);

//   if (!isNaN(days) && invoiceDate.length) {
//     invoiceDate = invoiceDate.split("-");
//     invoiceDate = new Date(invoiceDate[0], invoiceDate[1] - 1, invoiceDate[2]);
//     invoiceDate.setDate(invoiceDate.getDate() + days);

//     console.log(invoiceDate);
  
//   }
// });


function getUntilDate()
{
     var lastDateOG = $('#start_date').val();
     var lastDate = $('#start_date').val();
//   console.log(invoiceDate);
  var days = 30// Number(document.querySelector("#days").value);

  if (!isNaN(days) && lastDate.length) {
    lastDate = lastDate.split("-");
    lastDate = new Date(lastDate[0], lastDate[1] - 1, lastDate[2]);
    lastDate.setDate(lastDate.getDate() + days);

    // invoiceDate =   invoiceDate;
    
    $('.untildate').bootstrapMaterialDatePicker({ weekStart: 0, time: false, minDate: new Date(lastDateOG),maxDate: new Date(lastDate) });
    console.log(lastDate + "NIKKO") ;

    $(".untilDateLabel").show();
}

}
            // MAterial Date picker    
            $('.mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false, minDate: new Date() });
            // $('.untildate').bootstrapMaterialDatePicker({ weekStart: 0, time: false, minDate: new Date() });
            $('#timepicker').bootstrapMaterialDatePicker({ format: 'HH:mm', time: true, date: false });
            $('#date-format').bootstrapMaterialDatePicker({ format: 'dddd DD MMMM YYYY - HH:mm' });
        
            $('#from-date').bootstrapMaterialDatePicker({ format: 'YYYY/MM/DD HH:mm',time: false , minDate: new Date() });
            $('#to-date').bootstrapMaterialDatePicker({ format: 'YYYY/MM/DD HH:mm',time: false , minDate: new Date() });
            // Clock pickers
            $('#single-input').clockpicker({
                placement: 'bottom',
                align: 'left',
                autoclose: true,
                'default': 'now'
            });
            $('.clockpicker').clockpicker({
                donetext: 'Done',
            }).find('input').change(function() {
                console.log(this.value);
            });
            $('#check-minutes').click(function(e) {
                // Have to stop propagation here
                e.stopPropagation();
                input.clockpicker('show').clockpicker('toggleView', 'minutes');
            });
            if (/mobile/i.test(navigator.userAgent)) {
                $('input').prop('readOnly', true);
            }
            // Colorpicker
            $(".colorpicker").asColorPicker();
            $(".complex-colorpicker").asColorPicker({
                mode: 'complex'
            });
            $(".gradient-colorpicker").asColorPicker({
                mode: 'gradient'
            });
            // Date Picker
            jQuery('.mydatepicker, #datepicker').datepicker();
            jQuery('#datepicker-autoclose').datepicker({
                autoclose: true,
                todayHighlight: true
            });
            jQuery('#date-range').datepicker({
                toggleActive: true
            });
            jQuery('#datepicker-inline').datepicker({
                todayHighlight: true
            });
            // Daterange picker
            $('.input-daterange-datepicker').daterangepicker({
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-danger',
                cancelClass: 'btn-inverse'
            });
            $('.input-daterange-timepicker').daterangepicker({
                timePicker: true,
                format: 'MM/DD/YYYY h:mm A',
                timePickerIncrement: 30,
                timePicker12Hour: true,
                timePickerSeconds: false,
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-danger',
                cancelClass: 'btn-inverse'
            });
            $('.input-limit-datepicker').daterangepicker({
                format: 'MM/DD/YYYY',
                minDate: '06/01/2015',
                maxDate: '06/30/2015',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-danger',
                cancelClass: 'btn-inverse',
                dateLimit: {
                    days: 6
                }
            });
            
            </script>   
            
            <script>
            
            
            
!function($) {
    "use strict";

    var SweetAlert = function() {};

   //init
    @if(Session::has('to_notify'))
    swal("Created!", "{{ Session::get('to_notify') }}", "success")
    @endif
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
    }(window.jQuery);
</script>

<script>
function loggingInNotif()
{
    $("#loggingInForm").fadeIn();
}

function addRepeatDay($id)
{
  var days =  $("#repeatDay").val();

  var new_days
  $(":checkbox").change(function() {
    if(this.checked) {
        new_days =  $("#repeatDay").val(days + $id);
    }else{
        new_days =  days.replace($id,'');
        new_days =  $("#repeatDay").val(new_days);
    }
});
}
</script>
@endsection


