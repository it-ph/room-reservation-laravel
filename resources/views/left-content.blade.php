@if(\Auth::check())
<div class="card">
    <div class="card-body text-center">
        <button class="btn btn-info" data-toggle="modal" data-target="#addEventModal" style="font-weight: bold"><i class="fa fa-plus"></i> Create Event </button>
    </div>
</div>
@endif

<div class="card">
        <div class="card-body">
            <h3 class="card-title">Special title treatment</h3>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-success">Go somewhere</a>
        </div>
    </div>
    

<div class="card" style="background: transparent">
        <div class="card-body">
                <a class="weatherwidget-io" href="https://forecast7.com/en/14d42121d04/alabang/" data-label_1="ALABANG" data-label_2="WEATHER" data-days="3" data-theme="original" >ALABANG WEATHER</a>
                <script>
                !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                </script>
        </div>
    </div>
