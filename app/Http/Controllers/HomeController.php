<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventDate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::with(['eventdates' => function ($query) {
            $query->where('eventdateable_type', null)->where('date', '>=', Carbon::now())->orderBy('date', 'ASC')->get();
        }])->orderBy('name', 'ASC')->get();
        return view('home', compact('events'));
    }

    public function get(Request $request)
    {
        $events = Event::with('eventdates')->get();
        return response()->json($events);
    }
}
