@extends('layouts/appli')

@section('title')
Commandes
@endsection

@section('titre')
Commandes
@endsection

@section('sous-titre')
Gérer les commandes
@endsection

@section('icon')
edit
@endsection

@section('content')


     <!-- form  rechercher les dates-->
<div class="row">
     
     {!!Form::open(['action' => 'App\Http\Controllers\PagesController@rechercherCommandes', 'method' => 'PUT' ]) !!}
   

           <div class="row col col-md-10">
              
               <div class="col col-md-3">
                     {{Form::label('date_depart', 'La date départ: ')}}
                    {{Form::date('date_depart', '', [ 'class' => 'form-control'])}}
               
               </div>
               
               <div class="col col-md-3">
                    {{Form::label('date_fin', 'La date fin: ')}}
                    {{Form::date('date_fin', '', [ 'class' => 'form-control'])}}

                </div>

                    
                
                <div class="col col-md-1">{{Form::label('', '')}}
               {{Form::submit('Rechercher', ['class'=>'btn btn-primary '])}}
                </div>
               {!! Form::close() !!}   
        </div> 


        <div class="col col-md-12">
          <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
        </div>


     <!-- fin rech; date-->
         
          
          

               
           
           
   </div> 
     
        

        <div class="col col-md-12">
          <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
        </div>

        <div class="col col-md-12 table-responsive">
          <div class="table-responsive">
               <table class="table table-bordered table-striped table-hover">
                    <thead>
                         <tr>
                  
                                        <th style="width: 5%;">commande ID</th>
                                        <th style="width: 15%;">Nom de client</th>
                                        <th style="width: 15%;">Nom de produit</th>
                                        <th style="width: 7%;">Quantité</th>
                                        <th style="width: 5%;">Prix Total</th>
                                        <th style="width: 5%;">Date de commande</th>
                                        <th style="width: 5%;">Date de Modification</th>

                                        <th style="width: 7%;">Réalisé par</th>
                                        
                                        <th style="width: 10%;">Action</th>
                         </tr>
                    </thead>

                    <tbody>
                       @if (count($commandes) > 0)
                                 @foreach($commandes as $commande)
                                    <tr>
                                
                                    
                                        <td>{{$commande->id}}</td>
                                        <td>{{$commande->nom_client}} </td>
                                        <td>{{$commande->nom_produit}} </td>
                                        <td>{{$commande->nombre_produits}} </td>
                                        <td>{{$commande->prix_total}}</td>
                                        <td>{{$commande->created_at}}</td>
                                        <td>{{$commande->updated_at}}</td>
                                        
                                        <td>
                                            {{$commande->user->name}}
                                        </td>
                                        
                                        
                                        <td>
                                        <a href="commandes/{{$commande->id}}/edit" class="btn btn-info btn-sm" >
                                    
                                        Modifier<!--<i class="fa fa-pencil"></i>-->
                                        </a>
                                        
                                        {!!Form::open(['action' => ['App\Http\Controllers\commandesController@destroy', $commande->id], 'method' => 'POST', 'class' => 'pull-right'])!!} <!--, 'class' => 'pull-right'-->
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Supprimer', ['class' => 'btn btn-danger btn-sm'])}}
                                        {!!Form::close()!!}
                                        
                                        </td>
                                    
                        
                                    </tr>      
                                @endforeach
                                 
                        @else
                             <p>No commandes</p>
                        @endif
                        <!-- { {$commandes->links()}} -->
               
                    </tbody>
               </table>
          </div>
        </div>

      </div> 
               
               
               
                              
        

    <hr style="border-top: 2px solid #ff5252;">
     <!-- fin de form et de page -->
      
@endsection 