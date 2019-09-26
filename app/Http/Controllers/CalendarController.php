<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Rooms;
use App\Events;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Rooms::get();
        $events = Events::get();
    
        return view('home',compact('rooms','events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,
        [
            'title'       => 'required',
            'roomId'       => 'required',
            'start'       => 'required',
            'end'       => 'required',
          
        ],
            $messages = array('title.required' => 'Title is Required!',
            'roomId.unique' => 'Please Choose a Room!',
            'start.required' => 'Start Sched is Required!',
            'end.required' => 'End Sched is Required!',
            
            )
        );

        $request['start'] = $request['start'] . ":00";
        $request['end'] = $request['end'] . ":00";

        $request['start'] = Carbon::parse($request['start']);
        $request['end'] = Carbon::parse($request['end']);

        if( $request['start'] >  $request['end'] )
        {
            return redirect()->back()->with('date_range_error', 'Date End cannot be Greater than Date Start'); 
        }

        $request['createdBy'] = Auth::user()->id;
       
        $event = Events::create($request->all());
        return redirect()->back()
        // ->with('with_success', strtoupper($event->title) .' Created succesfully!')
        ->with('to_notify', strtoupper($event->title) .' was created Succesfully!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
