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
        
        // $aa = str_split($events->repeatDay);
        // return implode(",",$aa);
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
            'start_date'       => 'required',
            'start_time'       => 'required',
            'end_date'       => 'required',
            'end_time'       => 'required',
            // 'participants'       => 'required',
          
        ],
            $messages = array('title.required' => 'Title is Required!',
            'roomId.unique' => 'Please Choose a Room!',
            'participants.required' => 'Participants Number is Required!',
            
            )
        );

        $request['start'] = $request['start_date'] . " " . $request['start_time'] . ":00";
        $request['end'] = $request['end_date'] . " " . $request['end_time'] . ":00";

        $request['start'] = Carbon::parse($request['start']);
        $request['end'] = Carbon::parse($request['end']);

        if($request->has('repeatDay') && $request->filled('repeatDay'))
        {
            $request['repeatUntil'] = Carbon::parse($request['repeatUntil'])->addDay();
        }
        
        if( $request['start'] >  $request['end'] )
        {
            return redirect()->back()->with('date_range_error', 'Date End cannot be Greater than Date Start'); 
        }

        $event = Events::create([
            'title' => $request['title'],
            'roomId' => $request['roomId'],
            'repeatDay' => $request['repeatDay'],
            'repeatUntil' => $request['repeatUntil'],
            'participants' => $request['participants'],
            'start' => $request['start'],
            'end' => $request['end'],
            'createdBy' =>  Auth::user()->id,
            'remarks' => $request['remarks'],
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()
        // ->with('with_success', strtoupper($event->title) .' Created succesfully!')
        ->with('to_notify', strtoupper($event->title) . " " . $event->start->format('M d Y H:i A') .' - ' . $event->end->format('M d Y H:i A')); 
      
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
