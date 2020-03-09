<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventDate;
use App\Player;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $parent = Auth::user()->get();
        $players = Player::get()->where('user_id', Auth::user()->id);
        $mergedFamily = $parent->toBase()->merge($players);

        $pe = EventDate::with('event')->get()->where('eventdateable_id', Auth::user()->id)->where('date', '>=', Carbon::now());
        $ple = EventDate::get()->where('eventdateable_id', $players)->where('date', '>=', Carbon::now());
        $pem = $pe->toBase()->merge($ple);

        $ppe = EventDate::with('event')->get()->where('eventdateable_id', Auth::user()->id)->where('date', '<', Carbon::now());
        $pple = EventDate::get()->where('eventdateable_id', $players)->where('date', '<', Carbon::now());
        $ppem = $ppe->toBase()->merge($pple);

        return view('event.index', compact('players', 'pem', 'ppem'));
    }

}
