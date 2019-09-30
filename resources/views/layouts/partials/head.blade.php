
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon.ico')}}">
    <title>Room Reservation | Personiv Manila</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/fullcalendar.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/blue.css')}}" id="theme" rel="stylesheet">
    <link href="{{asset('css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery-clockpicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/asColorPicker.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{asset('css/floating-label.css')}}" rel="stylesheet">
    <link href="{{asset('css/sweetalert.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/google.font.css')}}" >
    <style>
    .topbar{ background: #003B5D}
    .page-wrapper {
    margin-left: 0px !important;
    }
    .topbar .navbar-header {
    background: transparent;
    } 

    .fc-button {
    background: #1976d2;
    border: 1px solid rgba(120, 130, 140, 0.13);
    color: #e9ecef;
    text-transform: capitalize;
    }  

    .fc-button:hover {
    background-color: #FFB22B !important;
    }  

    .fc-state-down, .fc-state-active {
    background-color: #003B5D;
    color: white;
    background-image: none;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15), 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .fc th.fc-sun, .fc th.fc-tue, .fc th.fc-thu, .fc th.fc-sat {
    background: #1976d2;
    color: white;
    font-weight: 400;
    }

    .fc th.fc-mon, .fc th.fc-wed, .fc th.fc-fri {
    background: #1976d2;
    color: white;
    font-weight: 400;
    }

    .fc-widget-content {
    border-color: rgba(0, 0, 0, 0.3) !important;
    }

    .fc-toolbar h2 {
    font-size: 22px;
    font-weight: 600;
    line-height: 30px;
    text-transform: uppercase;
    color: #003b5d !important;
    }

    .nav-pills .nav-link.active, .show>.nav-pills .nav-link {
    color: #fff !important;
    background-color: #1976d2;
    }

    .myCalendar {
    cursor: pointer;
    }
    .fc-event{
    cursor: pointer;
    
    }

    .popover.clockpicker-popover{
    z-index: 1050;
    }

    .fc-widget-header {
    border: 1px solid #f4f6f9 !important;
}
    

    .blink_me {
  animation: blinker 1s linear infinite;
    }

    @keyframes blinker {
    50% {
        opacity: 0;
    }
    }
</style>
    @yield('css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
