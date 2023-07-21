@extends('layouts/appli')

@section('title')
Modifier le profil 
@endsection

@section('titre')
Modifier le profil de {{$User->name}}
@endsection

@section('sous-titre')

@endsection

@section('icon')
home
@endsection

@section('content')
    
     <!-- form de ajouter produit -->
     <div class="row">
          <div class="row col col-md-6">
						
			
				 
	   
							
  {!! Form::open(['action' => ['App\Http\Controllers\PagesController@modifierProfil', $User->id], 'method' => 'POST', ]) !!}
								  <div class="form-group">
									   {{Form::label('name', 'Votre Nom: ')}}
									   {{Form::text('name', $User->name, ['class' => 'form-control', 'placeholder' => 'nom'])}}
								  </div>
								  <div class="form-group">
									{{Form::label('email', 'Votre E-mail: ')}}
									{{Form::text('email', $User->email, ['class' => 'form-control', 'placeholder' => 'test@gmail.com'])}}
							   </div>
								  <div class="form-group">
									   {{Form::label('password', 'Votre Mot de passe: ')}}
									   {{Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mot de passe:'])}}<!-- erreur si tu put something inside like 'password', ' '(ça), [etc-->
									   
								  </div>
								  
								  <br>
								  
								  {{Form::hidden('_method','PUT')}}	  
								  

								  <td>{{Form::submit('Valider', ['class'=>'btn btn-primary '])}}
											<a href="/pfe/public/Profile" class="btn btn-info btn-sm" >
												 Annuler
											</a>
								   </td>
									   
								  
						{!! Form::close() !!}
											
			 
                            </div>
                        </div>          
                       <hr style="border-top: 2px solid #ff5252;">
                        <!-- fin de form et de page -->
                         
                   @endsection 		