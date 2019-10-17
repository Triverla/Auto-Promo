@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2 panel">
            <fieldset>
                <legend>Application Error</legend>
                <h2 class="text-danger">Sorry...You have already applied. Application can only be done once.</h2>
                <p>Contact your H.O.D for more details</p>
                <a class="btn btn-sm btn-flat btn-primary" href="{{url('/aper/details')}}">Click here to contine</a>
                <hr>
            </fieldset>
        </div>
    </div>
@endsection