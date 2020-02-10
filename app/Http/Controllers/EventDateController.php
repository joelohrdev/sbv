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
        $players = Player::get()->where('user_id', Auth::user()->id);
        $mergedFamily = $parent->toBase()->merge($players);

        return view('event.edit', compact('event', 'mergedFamily'));
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
        $validate = $request->validate([
            'event_id',
            'eventdateable_id',
            'date',
            'time'
        ]);

        $event = EventDate::whereId($id);

        dd($event);
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
