@extends('layouts/appli')

@section('title')
Modifier un achat
@endsection

@section('titre')
Achat
@endsection

@section('sous-titre')
Modifier les données d'un achat
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
                                        <th style="width: 5%;">achat ID</th>
                                        <th style="width: 15%;">Nom de fournisseur</th>
                                        <th style="width: 18%;">Nom de produit</th>
                                        <th style="width: 7%;">Quantité</th>
                                        
                                        
                                        
                                        
                                        <th style="width: 9%;">Action</th>
                                     </tr>
                                </thead>
                                <tbody id="customers_div">
                                       
                                    <tr>
                                             
                                             {!! Form::open(['action' => ['App\Http\Controllers\achatsController@update', $achat->id], 'method' => 'POST', ]) !!}
                                                       
                                                       <td>{{$achat->id}}</td>
                                                       <td>
                                                       
                                                            <select name="nom_fournisseur" id="nom_fournisseur" class = "form-control">
                                                                 <option>{{$achat->nom_fournisseur}}</option>
                                                                           
                                                                           <?php
                                                                           
                                                                 
                                                                           
                                                                           $fournisseurs = DB::select('select name from fournisseurs order by name');
                                                                           //$nb = count($produits);
                                                                           //echo $nb;
                                                                           if(count($fournisseurs) > 0){
                                                                           foreach($fournisseurs as $fournisseur){
                                                                                
                                                                                          echo '<option>'  .$fournisseur->name. '</option>'; 
                                                                                          
                                                                           }
                                                                           }else{echo "No fournisseurs dans BD  ";}
                                                                           
                                                                           ?>
                                                  
                                                            </select></td>
                                                       
                                                       <td>
                                                       
                                                            <select name="nom_produit" id="nom_produit" class = "form-control">
                                                                 <option>{{$achat->nom_produit}}</option>
                                                                           
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
                                                       
                                                       <td>{{Form::text('nombre_produits', $achat->nombre_produits, ['class' => 'form-control', 'placeholder' => 'Packing'])}}</td>
                                                       
                                                       

                                                       
                                                            
                                                  {{Form::hidden('_method','PUT')}}

                                                       <td>{{Form::submit('Valider', ['class'=>'btn btn-primary'])}}
                                                                 <a href="/pfe/public/achats" class="btn btn-info btn-sm" >
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