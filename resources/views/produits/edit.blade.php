@extends('layouts/appli')

@section('title')
Modifier un produit
@endsection

@section('titre')
Produit
@endsection

@section('sous-titre')
Modifier les données d'un produit
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
                                        <th style="width: 5%;">Produit ID</th>
                                        <th style="width: 12%;">Nom</th>
                                        <th style="width: 15%;">Nom scientifique</th>
                                        <th style="width: 8%;">Packing</th>
                                        <th style="width: 5%;">Prix</th>
                                        <th style="width: 5%;">Stock</th>
                                        <th style="width: 5%;">Armoire</th>
                                        <th style="width: 9%;">Categorie</th>
                                        <th style="width: 5%;">Date Expiration</th>
                                        <th style="width: 12%;">Nom Fournisseur</th>
                                        <th style="width: 13%;">Action</th>
                                     </tr>
                                </thead>
                                <tbody id="customers_div">
                                       
                                    <tr>
                                             
                                             {!! Form::open(['action' => ['App\Http\Controllers\produitsController@update', $produit->id], 'method' => 'POST', ]) !!}
                                                       
                                                       <td>{{$produit->id}}</td>
                                                       
                                                       <td>{{Form::text('nom', $produit->nom, ['class' => 'form-control', 'placeholder' => 'nom'])}}</td>
                                                       
                                                       <td>{{Form::text('nom_scientifique', $produit->nom_scientifique, ['class' => 'form-control', 'placeholder' => 'Nom scientifique'])}}</td>
                                                       
                                                       <td>{{Form::text('packing', $produit->packing, ['class' => 'form-control', 'placeholder' => 'Packing'])}}</td>
                                                       
                                                       <td>{{Form::text('prix', $produit->prix, ['class' => 'form-control', 'placeholder' => 'Prix'])}}</td>

                                                       <td>{{Form::text('stock', $produit->stock, ['class' => 'form-control', 'placeholder' => 'Nb dans stock'])}}</td>
                                                       
                                                       <td>{{Form::text('armoire', $produit->armoire, ['class' => 'form-control', 'placeholder' => 'Armoire'])}}</td>
                                                       
                                                       <td>{{Form::text('categorie', $produit->categorie, ['class' => 'form-control', 'placeholder' => 'Categorie'])}}</td>
                                                       
                                                       <td>{{Form::date('date_expiration', $produit->date_expiration, ['class' => 'form-control', 'placeholder' => 'Date expiration'])}}</td>

                                                       <td>
                                                       <select name="nom_fournisseur" id="nom_fournisseur" class = "form-control">
                                                            <option>{{$produit->nom_fournisseur}}</option>
                                                                      
                                                                      <?php
                                                                      
                                                                      use Illuminate\Http\Request;
                                                                      use Illuminate\Support\Facades\DB; //il faut l'utiliser qu'une seul fois!! dans les autres db il faut pas declarer, il donne erreur
                                                                      
                                                                      
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
                                                            
                                                  {{Form::hidden('_method','PUT')}}

                                                       <td>{{Form::submit('Valider', ['class'=>'btn btn-primary'])}}
                                                                 <a href="/pfe/public/produits" class="btn btn-info btn-sm" >
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