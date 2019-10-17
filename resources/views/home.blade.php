@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Welcome
                        </div>
                        <div class="panel-body">
                            <h2 class="text-center">Welcome to Benue State University Annual Promotion for 2018/2019 Academic Session</h2>

                        <hr>
                        <p>Please ensure you update your profile regularly because assessment is based on your data</p>
                            <p><b>Application Steps</b></p>
                        <ul class="list-group">
                            <li>Login</li>
                            <li>Update your Profile if necessary</li>
                            <li>Click on Apply on the Navbar</li>
                            <li>Fill in the APER Form with correct details because each detail will be verified</li>
                            <li class="text-red">Note: You can't edit application once submitted, make sure you cross-check your work before submission</li>
                            <li>You can always check the progress of your evaluation in the feedback page</li>

                        </ul>
                            <p>Wishing you success in your promotion...<i>BSU Promotion Team</i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
