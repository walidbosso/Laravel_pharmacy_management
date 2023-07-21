@extends('layouts/appli')

@section('title')
Modifier un commande
@endsection

@section('titre')
Commande
@endsection

@section('sous-titre')
Modifier les données d'un commande
@endsection

@section('icon')
edit
@endsection

@section('content')


     <!-- form  -->
     
               
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
                                        <th style="width: 5%;">commande ID</th>
                                        <th style="width: 15%;">Nom de client</th>
                                        <th style="width: 18%;">Nom de produit</th>
                                        <th style="width: 7%;">Quantité</th>
                                        
                                        
                                        
                                        
                                        <th style="width: 9%;">Action</th>
                                     </tr>
                                </thead>
                                <tbody id="customers_div">
                                       
                                    <tr>
                                             
                                             {!! Form::open(['action' => ['App\Http\Controllers\commandesController@update', $commande->id], 'method' => 'POST', ]) !!}
                                                       
                                                       <td>{{$commande->id}}</td>
                                                       
                                                       <td>
                                                            <select name="nom_client" id="nom_client" class = "form-control">
                                                                 <option>{{$commande->nom_client}}</option>
                                                                           
                                                                           <?php
                                                                           
                                                                           use Illuminate\Http\Request;
                                                                           use Illuminate\Support\Facades\DB; //il faut l'utiliser qu'une seul fois!! dans les autres db il faut pas declarer, il donne erreur
                                                                           
                                                                           
                                                                           $clients = DB::select('select name from clients order by name');
                                                                           //$nb = count($produits);
                                                                           //echo $nb;
                                                                           if(count($clients) > 0){
                                                                           foreach($clients as $client){
                                                                                
                                                                                          echo '<option>'  .$client->name. '</option>'; 
                                                                                          
                                                                           }
                                                                           }else{echo "No clients dans BD  ";}
                                                                           
                                                                           ?>
                                                  
                                                            </select></td>
                                                       
                                                       <td>
                                                            <select name="nom_produit" id="nom_produit" class = "form-control">
                                                                 <option>{{$commande->nom_produit}}</option>
                                                                           
                                                                           <?php
                                                                           
                                                                 
                                                                           
                                                                           $produits = DB::select('select nom from produits order by nom');
                                                                           //$nb = count($produits);
                                                                           //echo $nb;
                                                                           if(count($produits) > 0){
                                                                           foreach($produits as $produit){
                                                                                
                                                                                          echo '<option>'  .$produit->nom. '</option>'; 
                                                                                          
                                                                           }
                                                                           }else{echo "No produits dans BD  ";}
                                                                           
                                                                           ?>
                                                  
                                                            </select></td>
                                                       
                                                       <td>{{Form::text('nombre_produits', $commande->nombre_produits, ['class' => 'form-control', 'placeholder' => 'Nombre'])}}</td>
                                                       
                                                       

                                                       
                                                            
                                                  {{Form::hidden('_method','PUT')}}

                                                       <td>{{Form::submit('Valider', ['class'=>'btn btn-primary'])}}
                                                                 <a href="/pfe/public/commandes" class="btn btn-info btn-sm" >
                                                                      Annuler
                                                                 </a>
                                                        </td>
                                                            
                                                       
                                             {!! Form::close() !!}
                                    </tr>             
                             
                                </tbody>
                           </table>
                      </div>
                    </div>
          
                  </div>
               
                              
        

    <hr style="border-top: 2px solid #ff5252;">
     <!-- fin de form et de page -->
      
@endsection 