@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('titre')
Acceuil
@endsection

@section('sous-titre')
Gestion du pharmacie
@endsection

@section('icon')
handshake
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-white">
                    <div class="card-header">{{ __('Dashboard') }}</div> 

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


