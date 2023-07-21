@extends('layouts/appli')

@section('title')
Commandes
@endsection

@section('titre')
Commandes
@endsection

@section('sous-titre')
Ajouter un commande
@endsection

@section('icon')
handshake
@endsection

@section('content')


     
          
          {!! Form::open(['action' => 'App\Http\Controllers\commandesController@store', 'method' => 'POST', ]) !!}
               <div class="form-group">
                    <strong>{{Form::label('nom_client', 'Nom du client: ')}}</strong>
                    
                         

                    
                    <select name="nom_client" id="nom_client" class = "form-control">
                         <option disabled selected hidden> Selectioner un client </option>
                         <?php
                          
                         use Illuminate\Http\Request;
                         use Illuminate\Support\Facades\DB; //il faut l'utiliser qu'une seul fois!! dans les autres db il faut pas declarer, il donne erreur
                         
                         
                         $cls = DB::select('select name from clients order by name');
                         //$nb = count($produits);
                         //echo $nb;
                         if(count($cls) > 0){
                             foreach($cls as $cl){
                                
                                          echo '<option>'  .$cl->name. '</option>'; 
                                         
                             }
                         }else{echo "No clients dans BD  ";}
                         
                         ?>

                    </select>
               </div>
     <hr><br>
               <div class="col col-md-15">
                    <hr class="col-md-15" style="padding: 0px; border-top: 3px solid  #0310ff;">
                    
                  </div>
               

               <div class="row col col-md-10">
                    <div class="row col col-md-10 font-weight-bold">
                         <div class="col col-md-7"><strong>Nom du Produit</strong></div>
                         
                         <div class="col col-md-3"><strong>Quantity</strong></div>
                         
                         
                    </div>
               </div>
                  
               <div class="col col-md-15">
                    <hr class="col-md-15" style="padding: 0px; border-top: 3px solid  #0310ff;">
                    
                  </div>

               <div class="row col col-md-10">
                    <div class="row col col-md-10 font-weight-bold">
                         <div class="col col-md-7">
                         

                              
                         

                    
                              <select name="nom_produit" id="nom_produit" class = "form-control">
                                   <option disabled selected hidden> Selectioner un produit </option>
                                   <?php
                                                                       
                                   
                                   $pls = DB::select('select nom from produits order by nom');
                                   //$nb = count($produits);
                                   //echo $nb;
                                   if(count($pls) > 0){
                                       foreach($pls as $pl){
                                          
                                                    echo '<option>'  .$pl->nom. '</option>'; 
                                                   
                                       }
                                   }else{echo "No produits dans BD  ";}
                                   
                                   ?>
          
                              </select>
                         </div>

                         <div class="col col-md-3">
                             
                              {{Form::text('nombre_produits', '', ['class' => 'form-control', 'placeholder' => 'Nombre '])}}
                         </div>
                    </div>
                    
              
                    
               </div>
               <br/> 
               {{Form::submit('Executer', ['class'=>'btn btn-primary'])}}
          {!! Form::close() !!}

          
        <!-- form content end -->
    
     <!-- form de ajouter produit -->
    <hr style="border-top: 2px solid #ff5252;">
     <!-- fin de form et de page -->
      
@endsection 