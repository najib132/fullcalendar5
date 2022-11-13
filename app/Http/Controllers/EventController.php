<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Auth;
use App\User;

class EventController extends Controller
{
    public function __construct() {
     $this->middleware('auth'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = array();
        $bookings = Event::all();
        $eventss = Event::all();
        //$eventsss = Event::where('status','Valide')->get();
        $eventsss = Event::where('status','Valide')->get();
        
        foreach($bookings as $booking) {
            $color = null;
            $events[] = [
                'id'  => $booking->id,
                'title' => $booking->name,
                'start' => $booking->datee,
                'allDay' => false,
            ];
        }
        $users  = User::all();
        return view('index')->with([
            'events'      => $events,
            'eventss'     => $eventss,
            'users'       => $users,
            'eventsss'    => $eventsss
        ]);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ 
        'datee' => ['required'] ,
        'titre' => ['required'] ,
        'comment' => ['required'] 
        ]);

        $event = new Event();
        $event->datee = $request->datee;
        $event->name = $request->titre;
        $event->comment = $request->comment;
        $event->user_id = Auth::user()->id;
        $save = $event->save();

        if($save)  return response()->json(['status'=>true]); 
        return response()->json(['status' => false], 500); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $event = Event::find($id);   
       return $event;
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
        $request->validate([ 
        'dateedit' => ['required'] ,
        'titreedit' => ['required'] ,
        'commentedit' => ['required'] 
        ]);


        $event = Event::find($id);
        $event->datee   = $request->dateedit;
        $event->name    = $request->titreedit;
        $event->comment = $request->commentedit;

        $save = $event->save();
        if($save) return response()->json(["status"=>true]);
        return response()->json(["status"=>false], 500);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $event = Event::find($id);
        if(! $event) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $delete = $event->delete();
        if($delete)  return response()->json(['status'=>true]); 
        return response()->json(['status' => false], 500); 
    }


     public function updateMultiple(Request $request)
    {
        $updates =Event::whereIn('id', $request->ids)->update(['status' => request('status')]);
        if($updates)  return response()->json(['status'=>true]); 
        return response()->json(['status' => false], 500); 
    }

    
}
