@if(Session::has('with_success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         {{ Session::get('with_success') }} <i class="fa fa-check"></i>
</div>
@endif

@if(Session::has('date_range_error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('date_range_error') }} <i class="fa fa-warning"></i>
    </div>
@endif





