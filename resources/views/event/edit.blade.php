@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $event->event->name }}<br>
                        {{ $event->date->format('F d, Y') }}<br>
                        {{ \Carbon\Carbon::parse($event->time)->format('g:i A') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="/event/{{ $event->id }}">
                            @csrf

                            <input name="event_id" type="hidden" value="{{ $event->event->id }}">

                            <div class="form-group row">

                                <label for="eventdateable_id" class="col-md-4 col-form-label text-md-right">{{ __('Select a Member') }}</label>

                                <div class="col-md-6">
                                    <select name="eventdateable" class="form-control" id="eventdateable_id">
                                        <option></option>
                                        <option value="{{ class_basename(Auth::user()) . '.' . Auth::id() }}">{{ Auth::user()->name }}</option>
                                        @foreach($players as $p)
                                            <option value="{{ class_basename(get_class($p)) . '.' . $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <input name="date" type="hidden" value="{{ $event->date->format('Y-m-d') }}">
                            <input name="time" type="hidden" value="{{ $event->time }}">

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
