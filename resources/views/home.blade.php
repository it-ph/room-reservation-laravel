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
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">ALL</span></a> </li>
                            @foreach($rooms as $room)
                            <li class="nav-item"> 
                                <a style="font-size: 12.5px; font-weight: bold; color:{{$room->color_code}} " class="nav-link" data-toggle="tab" href="#room-{{strtoupper($room->id)}}" role="tab" aria-expanded="false">
                                    <span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">
                                    <i class="fa fa-circle" style="font-size: 10px; color: {{$room->color_code}}"></i> {{strtoupper($room->room)}}</span></a> </li>
                            @endforeach
                             </ul>
                            <!-- Tab panes -->
                            <div class="tab-content br-n pn">
                                <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
                                   <div class="card-body calender-sidebar">
                                        <div id="calendarAll"></div>
                                    </div>
                                </div>
                            
                            @foreach($rooms as $room)
                                <div class="tab-pane" id="room-{{$room->id}}" role="tabpanel" aria-expanded="false">
                                    {{strtoupper($room->room)}}
                                    <div class="card-body calender-sidebar">
                                            <div id="calendar{{$room->id}}"></div>
                                        </div>
                                </div>

                            @endforeach
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
                    var CalendarApp = function() {
                    this.$body = $("body")
                    this.$calendar = $('#calendarAll'),
                    this.$event = ('#calendar-events div.calendar-events'),
                    this.$modal = $('#my-event-all'),
                    this.$saveCategoryBtn = $('.save-category'),
                    this.$calendarObj = null
                };
            
                CalendarApp.prototype.onEventClick =  function (calEvent, jsEvent, view) {
                    var $this = this;
                        var form = $("<div></div>");
                        var start = moment(calEvent._start).format("MMM Do YYYY h:mm A ddd ");
                        var end = moment(calEvent.end).format("MMM Do YYYY h:mm A ddd ");
                        form.append("<div><h3><strong> "+ calEvent.title + "</strong></h3><hr><p style='font-weight: bold'>"
                        + start +  " - " + end + "</p>" +
                        "<p><span style='font-weight: 600'>Created By:</span> " + calEvent.createdBy + "</p>" +
                        "<p><span style='font-weight: 600'>Location:</span> " + calEvent.location + "</p>"  +
                        "<hr><p style='font-weight: 600'>Remarks: </p>"  + calEvent.remarks +"</div>"
                        );
                    
                        $this.$modal.modal({
                            backdrop: 'static'
                        });
                        $this.$modal.find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function () {
                            $this.$calendarObj.fullCalendar('removeEvents', function (ev) {
                                return (ev._id == calEvent._id);
                            });
                            $this.$modal.modal('hide');
                        });
                },
                 
                /* Initializing */
                CalendarApp.prototype.init = function() {
                    var defaultEvents =  [
                        
                        @foreach($events as $event)    
                            {
                                title: "{{strtoupper($event->title)}}",
                                start: "{{ \Carbon\Carbon::parse($event->start)->format('Y-m-d H:i')}}",
                                end: "{{ \Carbon\Carbon::parse($event->end)->format('Y-m-d H:i') }}",
                                location: "@if($event->theRoom){{ucwords($event->theRoom->room)}}@endif",
                                remarks: "{{$event->remarks}}",
                                createdBy: "@if($event->theCreator){{$event->theCreator->fullname}}@endif",
                                backgroundColor: "@if($event->theRoom){{$event->theRoom->color_code}}@endif",
                                borderColor: "@if($event->theRoom){{$event->theRoom->color_code}}@endif",
                            },
                        @endforeach 
                      ];
            
                    var $this = this;
                    $this.$calendarObj = $this.$calendar.fullCalendar({
                        nextDayThreshold: '00:00:00',
                        defaultView: 'month',  
                        handleWindowResize: true,   
                         
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                        },
                        events: defaultEvents,
                        editable: false,
                        droppable: false,
                        eventLimit: true, // allow "more" link when too many events
                        selectable: true,
                        eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }
            
                    });
            
                },
            
               //init CalendarApp
                $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp
                $.CalendarApp.init()
                </script>
        

        <script>
            // MAterial Date picker    
            $('#mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
            $('#timepicker').bootstrapMaterialDatePicker({ format: 'HH:mm', time: true, date: false });
            $('#date-format').bootstrapMaterialDatePicker({ format: 'dddd DD MMMM YYYY - HH:mm' });
        
            $('#from-date').bootstrapMaterialDatePicker({ format: 'YYYY/MM/DD HH:mm', minDate: new Date() });
            $('#to-date').bootstrapMaterialDatePicker({ format: 'YYYY/MM/DD HH:mm', minDate: new Date() });
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
    swal("Successfully Created!", "{{ Session::get('to_notify') }}", "success")
    @endif
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
    }(window.jQuery);
</script>

@endsection


