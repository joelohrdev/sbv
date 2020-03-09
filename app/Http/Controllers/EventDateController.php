<?php

namespace App\Http\Controllers;

use App\EventDate;
use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventDate  $eventDate
     * @return \Illuminate\Http\Response
     */
    public function show(EventDate $eventDate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventDate  $eventDate
     * @return \Illuminate\Http\Response
     */
    public function edit(EventDate $eventDate, $id)
    {
        $event = EventDate::findOrFail($id);

        $parent = Auth::user()->get();
        $players = Player::get()->where('user_id', Auth::id());
        $mergedFamily = $parent->toBase()->merge($players);

        return view('event.edit', compact('event', 'mergedFamily', 'players'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventDate  $eventDate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventDate $eventDate, $id)
    {
        $eventdateablePair = explode('.', $request->eventdateable);
        $edType = $eventdateablePair[0];
        $edId = $eventdateablePair[1];

        $validate = $request->validate([
            'event_id',
            'eventdateable_id',
            'date',
            'time'
        ]);

        $eventDate = EventDate::find($id);
        $eventDate->event_id = $request->get('event_id');
        $eventDate->eventdateable_type = "App\\" . $edType;
        $eventDate->eventdateable_id = $edId;
        $eventDate->date = $request->get('date');
        $eventDate->time = $request->get('time');
        $eventDate->save();

        return redirect('/myevents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventDate  $eventDate
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventDate $eventDate)
    {
        //
    }
}
