@if(!\Auth::check())  
<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background: #1976D2;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: white"><i class="fa fa-unlock"></i> Login</h4>
        </div>
        <div class="modal-body" style="padding-top: 40px">
          
         
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="username" class="col-md-3 col-form-label text-md-right">Username</label>

                        <div class="col-md-9">
                            <input id="email" type="text" class="form-control @error('name') is-invalid @enderror" name="username" value="{{ old('name') }}" required autocomplete="username" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-9">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div id="loggingInForm" style="color: red; display:none" class="blink_me"> Logging in...</div>

                    {{-- <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div> --}}
             
       
            

        </div><!--modal-body-->
        <div class="modal-footer">
                <button type="submit" onclick="loggingInNotif();" class="btn btn-primary">
                        {{ __('Login') }} <i class="fa fa-chevron-circle-right"></i>
                    </button>
                </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div><!-- END LOGIN MODAL -->

  @endif


  <!-- ADD EVENT MODAL -->
  @if(\Auth::check())  
  <div id="addEventModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background: #1976D2;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: white"><i class="fa fa-calendar"></i> CREATE EVENT</h4>
        </div>
        <div class="modal-body" style="padding-top: 40px">
     <div class="floating-labels">
          <form method="POST" action="{{ route('events.store') }}">
             @csrf
                
             <div class="form-group">
                    <label class="control-label"><strong>EVENT TITLE <span style="color: red; font-weight: bold;">*</span></strong></label>
                    <input type="text" id="title" value="{{old('title')}}" autocomplete="off" required name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label class="control-label" for="roomId">
                        <strong>LOCATIONS 
                        <span style="color: red; font-weight: bold;">*</span>
                        <span style="font-size: 11px; font-style:italic;font-weight: normal">(dropdown select)</span>
                        </strong>
                    </label>
                    <select name="roomId" required id="roomId"  class="form-control">
                        <option value=""></option>
                        @foreach($rooms as $room)
                            <option value="{{$room->id}}">{{strtoupper($room->room)}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" required class="form-control" value="{{old('start')}}" placeholder="FROM" id="from-date" name="start" style="margin-bottom: 10px">
                    <input type="text" required class="form-control" value="{{old('end')}}" placeholder="TO" id="to-date" name="end">
                </div>

                <div class="form-group">
                    <label class="control-label" for="participants"><strong>PARTICIPANTS <span style="color: red; font-weight: bold;">*</span></strong></label>
                    <input type="number" id="participants" required value="{{old('participants')}}"   autocomplete="off" name="participants" class="form-control">
                </div>
    

                <div class="form-group">
                    <label class="control-label"><strong>REMARKS</strong></label>
                    <textarea name="remarks" class="form-control" id="remarks" cols="30" rows="5">{{old('remarks')}}</textarea>
                </div>
           
               
                        
        </div><!--floating-->
            

        </div><!--modal-body-->
        <div class="modal-footer" style="background: rgba(0, 0, 0, 0.05)">
        <span style="font-weight: bold; font-size: 11px; margin-right: 20px"><img src="{{asset('images/logo.png')}}" style="width: 30px" alt=""> Room Reservation.</span>
            <button type="submit" onclick="return confirm('Are you sure you want to Create this Event?')" class="btn btn-info">
                    Submit <i class="fa fa-floppy-o"></i>
            </button>
            </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div><!-- END ADD EVENT MODAL-->

@endif
