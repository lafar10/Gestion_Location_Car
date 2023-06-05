@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('Authentification_Error'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('Authentification_Error') }}
                        </div>
                    @endif


                    {{ __('You are logged in!') }}
                    <br>
                    <br>
                    @if (auth()->user()->role_as == 'admin')
                        <a class="btn btn-secondary btn-sm float-end" href="/dashboard">Go To Dashboard</a>
                    @else
                        <a class="btn btn-secondary btn-sm float-end" href="/">Go To Home</a>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
