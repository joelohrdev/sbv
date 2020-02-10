@extends('layouts.app')

@section('content')
<div class="container">
    @guest
    <div class="row justify-content-center mb-50">
        <div class="alert alert-primary mb-2" role="alert">
            <i class="feather icon-star mr-1 align-middle"></i>
            <span>
            You must login or register to sign up for events.</span>
        </div>
    </div>
    @endguest
    <div class="row">
        @foreach ($events as $e)
        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">{{ $e->name }}</h4>
                        <p class="card-text">
                            <span class="badge badge-pill bg-success">{{ $e->eventcategory->name }}</span>
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($e->eventdates as $ed)
                            <li class="list-group-item">
                                <a href="/event/{{ $ed->id }}" class="btn-outline-primary btn-sm waves-effect waves-light float-right">Sign Up</a>
                                {{ \Carbon\Carbon::parse($ed->date)->toFormattedDateString() }} at {{ \Carbon\Carbon::parse($ed->time)->format('g:i A') }}
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
