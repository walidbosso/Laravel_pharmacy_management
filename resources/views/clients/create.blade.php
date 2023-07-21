@extends('layouts/appli')

@section('title')
Clients
@endsection

@section('titre')
Clients
@endsection

@section('sous-titre')
Ajouter un client 
@endsection

@section('icon')
handshake
@endsection

@section('content')
    
     <!-- form de ajouter produit -->
     <div class="row">
          <div class="row col col-md-6">
               
               {!! Form::open(['action' => 'App\Http\Controllers\clientsController@store', 'method' => 'POST', ]) !!}
                    <div class="form-group">
                         {{Form::label('name', 'Nom du client: ')}}
                         {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'ex: Ahmed El Imrani'])}}
                    </div>
                    <div class="form-group">
                         {{Form::label('addresse', 'Adresse: ')}}
                         {{Form::text('addresse', '', [ 'class' => 'form-control', 'placeholder' => 'Adresse'])}}
                    </div>
                    <div class="form-group">
                         {{Form::label('email', 'E-mail: ')}}
                         {{Form::text('email', '', [ 'class' => 'form-control', 'placeholder' => 'Email de client'])}}
                    </div>
                    <div class="form-group">
                         {{Form::label('telephone', 'Telephone: ')}}
                         {{Form::text('telephone', '', [ 'class' => 'form-control', 'placeholder' => 'Numero du telephone de client'])}}
                    </div>
                    <br>
                    {{Form::submit('Inserer', ['class'=>'btn btn-primary'])}}
               {!! Form::close() !!}
                              
          </div>
     </div>          
    <hr style="border-top: 2px solid #ff5252;">
     <!-- fin de form et de page -->
      
@endsection 