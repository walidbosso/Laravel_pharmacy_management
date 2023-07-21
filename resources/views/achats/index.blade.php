@extends('layouts/appli')

@section('title')
Achats
@endsection

@section('titre')
Achats
@endsection

@section('sous-titre')
Gérer les achats
@endsection

@section('icon')
edit
@endsection

@section('content')


     <!-- form  -->
     {!! Form::open(['action' => 'App\Http\Controllers\PagesController@rechercherAchats', 'method' => 'GET', ]) !!}
   

     <div class="row col col-md-10">
          
               <div class="col col-md-3">
                    {{Form::label('date_depart', 'La date départ: ')}}
                    {{Form::date('date_depart', '', [ 'class' => 'form-control'])}}
               
               </div>
               
               <div class="col col-md-3">
                    {{Form::label('date_fin', 'La date fin: ')}}
                    {{Form::date('date_fin', '', [ 'class' => 'form-control'])}}

                </div>

                
        </div>    <br>
                <div class="col col-md-1">
               {{Form::submit('Rechercher', ['class'=>'btn btn-primary '])}}
                </div>
               {!! Form::close() !!}   
     <div class="row">
     
        

        <div class="col col-md-12">
          <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
        </div>

        <div class="col col-md-12 table-responsive">
          <div class="table-responsive">
               <table class="table table-bordered table-striped table-hover">
                    <thead>
                         <tr>
                  <!-- <th style="width: 2%;">SL.</th>-->
                                        <th style="width: 5%;">Achat ID</th>
                                        <th style="width: 15%;">Nom de fournisseur</th>
                                        <th style="width: 15%;">Nom de produit</th>
                                        <th style="width: 7%;">Quantité</th>
                                        <th style="width: 5%;">Prix Total</th>
                                        <th style="width: 5%;">Date de achat</th>
                                        <th style="width: 5%;">Date de Modification</th>

                                        <th style="width: 7%;">Réalisé par</th>
                                        
                                        <th style="width: 10%;">Action</th>
                         </tr>
                    </thead>

                    <tbody>
                       @if (count($achats) > 0)
                                 @foreach($achats as $achat)
                                    <tr>
                                
                                    
                                        <td>{{$achat->id}}</td>
                                        <td>{{$achat->nom_fournisseur}} </td>
                                        <td>{{$achat->nom_produit}} </td>
                                        <td>{{$achat->nombre_produits}} </td>
                                        <td>{{$achat->prix_total}}</td>
                                        <td>{{$achat->created_at}}</td>
                                        <td>{{$achat->updated_at}}</td>
                                        
                                        <td>
                                            {{$achat->user->name}}
                                        </td>
                                        
                                        
                                        <td>
                                        <a href="achats/{{$achat->id}}/edit" class="btn btn-info btn-sm" >
                                    
                                        Modifier<!--<i class="fa fa-pencil"></i>-->
                                        </a>
                                        
                                        {!!Form::open(['action' => ['App\Http\Controllers\achatsController@destroy', $achat->id], 'method' => 'POST', 'class' => 'pull-right'])!!} <!--, 'class' => 'pull-right'-->
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Supprimer', ['class' => 'btn btn-danger btn-sm'])}}
                                        {!!Form::close()!!}
                                        
                                        </td>
                                    
                        
                                    </tr>      
                                @endforeach
                                 
                        @else
                             <p>No achats</p>
                        @endif
                        <!-- { {$achats->links()}} -->
               
                    </tbody>
               </table>
          </div>
        </div>

      </div> 
               
               
               
                              
        

    <hr style="border-top: 2px solid #ff5252;">
     <!-- fin de form et de page -->
      
@endsection 