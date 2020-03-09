@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card-deck-wrapper mt-lg-5">
                    <div class="card-deck">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h4 class="card-title">Family</h4>
                                    <hr>
                                    <p class="card-text"><i class="feather icon-user mr-2"></i>{{ Auth::user()->name }}<br></p>
                                    @foreach ($players as $f)
                                        <p class="card-text"><i class="feather icon-user mr-2"></i>{{ $f->name }}<br></p>
                                    @endforeach
                                    <a href="/newplayer" class="btn bg-primary btn-block mt-2 text-white">Create New Player</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card-deck-wrapper mt-lg-5">
                    <div class="card-deck">
                        @foreach($pem as $be)
                            <div class="col-4">
                                <div class="card mb-3">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $be->event->name }}</h4>
                                            <p>{{ $be->eventdateable->name }}<br>
                                            {{ \Carbon\Carbon::parse($be->date)->format('F d, Y') }}<br>
                                            {{ \Carbon\Carbon::parse($be->time)->format('g:i A') }}</p>
{{--                                            <p class="card-text"><small class="text-muted">Signed up {{ \Carbon\Carbon::parse($be->created_at)->diffForHumans() }}</small></p>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Past Volunteer Events</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p class="text-muted">If you have any questions about attendance please email <a href="mailto:sherryl.clgfs@gmail.com">sherryl.clgfs@gmail.com</a></p>
                            <div class="table-responsive">
                                <table class="table table-hover-animation mb-0">
                                    <tbody>
                                        @foreach($ppem as $pe)
                                            <tr>
                                                <td>{{ $pe->eventdateable->name }}</td>
                                                <td>{{ $pe->event->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($pe->date)->format('F d, Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($pe->time)->format('g:i A') }}</td>
                                                <td>
                                                    @if ($pe->attended == 1)
                                                        <span class="text-success"><i class="mr-10 feather icon-award"></i>Attended</span>
                                                    @else
                                                        <span class="text-danger"><i class="mr-10 feather icon-alert-circle"></i> Did Not Attend</span>
                                                    @endif
                                                </td>
                                                <td>{{ $pe->notes }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
