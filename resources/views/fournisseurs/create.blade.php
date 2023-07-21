@extends('layouts/appli')

@section('title')
Fournisseurs
@endsection

@section('titre')
Fournisseurs
@endsection

@section('sous-titre')
Ajouter des fournisseurs

@endsection

@section('icon')
handshake
@endsection

@section('content')

<div class="row">
     <div class="row col col-md-6">
          
          {!! Form::open(['action' => 'App\Http\Controllers\fournisseursController@store', 'method' => 'POST', ]) !!}
               <div class="form-group">
                    {{Form::label('name', 'Nom de fournisseur (supplier) : ')}}
                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nom entreprise'])}}
               </div>
               <div class="form-group">
                    {{Form::label('addresse', 'Addresse: ')}}
                    {{Form::text('addresse', '', [ 'class' => 'form-control', 'placeholder' => 'Addresse entreprise'])}}
               </div>
               <div class="form-group">
                    {{Form::label('email', 'E-mail: ')}}
                    {{Form::text('email', '', [ 'class' => 'form-control', 'placeholder' => 'E-mail de fournisseur'])}}
               </div>
               <div class="form-group">
                    {{Form::label('telephone', 'Telephone: ')}}
                    {{Form::text('telephone', '', [ 'class' => 'form-control', 'placeholder' => 'Numero du telephone de fournisseur'])}}
               </div>
               <br>
               {{Form::submit('Inserer', ['class'=>'btn btn-primary'])}}
          {!! Form::close() !!}
                         
     </div>
</div>    
    
     <!-- form de ajouter produit -->
    <hr style="border-top: 2px solid #ff5252;">
     <!-- fin de form et de page -->
      
@endsection 