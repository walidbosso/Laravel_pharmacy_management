@extends('layouts/appli')

@section('title')
Produits
@endsection

@section('titre')
Produits
@endsection

@section('sous-titre')
Gérer les produits
@endsection

@section('icon')
edit
@endsection

@section('content')


     <!-- form  -->
     
     <div class="row">
          
               
                    
                    {!! Form::open(['action' => 'App\Http\Controllers\PagesController@rechercherProduit', 'method' => 'GET', ]) !!}
                              <div class="form-group">
                                   {{Form::label( 'Rechercher un champ voulu: ')}}
                              </div>     
                         
                              <div class="row col col-md-13">
                                   
                                        <div class="col col-md-4"><select name="produit" id="name" class = "form-control">
                                             <option disabled selected hidden> Selectioner un produit </option>
                                             <?php
                                              
                                             use Illuminate\Http\Request;
                                             use Illuminate\Support\Facades\DB; //il faut l'utiliser qu'une seul fois!! dans les autres db il faut pas declarer, il donne erreur
                                             
                                             
                                             $pls = DB::select('select distinct nom from produits order by nom');
                                             //$nb = count($produits);
                                             //echo $nb;
                                             if(count($pls) > 0){
                                                 foreach($pls as $pl){
                                                    
                                                              echo '<option>'  .$pl->nom. '</option>'; 
                                                             
                                                 }
                                             }
                                             
                                             ?>
                    
                                        </select></div>
                                        
                                        <div class="col col-md-3"><select name="categorie" id="name" class = "form-control">
                                             <option disabled selected hidden> Selectioner une categorie </option>
                                             <?php
                                              
                                              //il faut l'utiliser qu'une seul fois!! dans les autres db il faut pas declarer, il donne erreur
                                             
                                             
                                             $ps = DB::select('select distinct categorie from produits order by categorie');
                                             //$nb = count($produits);
                                             //echo $nb;
                                             if(count($ps) > 0){
                                                 foreach($ps as $p){
                                                    
                                                              echo '<option>'  .$p->categorie. '</option>'; 
                                                             
                                                 }
                                             }
                                             
                                             ?>
                    
                                        </select>
                                        </div>

                                        <div class="col col-md-3"><select name="nom_scientifique" id="name" class = "form-control">
                                             <option disabled selected hidden> Selectioner un nom scientifique </option>
                                             <?php
                                              
                                              //il faut l'utiliser qu'une seul fois!! dans les autres db il faut pas declarer, il donne erreur
                                             
                                             
                                             $ns = DB::select('select distinct nom_scientifique from produits order by nom_scientifique');
                                             //$nb = count($produits);
                                             //echo $nb;
                                             if(count($ns) > 0){
                                                 foreach($ns as $n){
                                                    
                                                              echo '<option>'  .$n->nom_scientifique. '</option>'; 
                                                             
                                                 }
                                             }
                                             
                                             ?>
                    
                                        </select>
                                        </div>
                                        
                                        
                                  
                             
                    
                              
                              
                              
                                        <div class="col col-md-2">
                              <!--{{Form::hidden('_method','PUT')}}  car get/head dans route-->
          
                              {{Form::submit('Executer', ['class'=>'btn btn-primary'])}}
          
                              {!! Form::close() !!}</div>
                    </div><!--10 md ici -->
                       <!-- ajouter        nom_sci/gateg-->        
               </div>
            
         <br>
         <hr style="border-top: 2px solid #ff5252;">

     
        <div class="col col-md-12">
          <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
        </div>
          <button class="btn btn-danger font-weight-bold" ><a href="PasDeStock" class="btn btn-danger font-weight-bold">Terminés</a></button>
      <button class="btn btn-warning " >
          <a href="expire" class="btn btn-warning">Périmés</a></button>
      <div class="col col-md-12">
          <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
          </div>
          <hr style="border-top: 2px solid #ff5252;">

        <div class="col col-md-12 table-responsive">
          <div class="table-responsive">
               <table class="table table-bordered table-striped table-hover">
                    <thead>
                         <tr>
                 
                                        <th style="width: 5%;">Produit ID</th>
                                        <th style="width: 15%;">Nom</th>
                                        <th style="width: 18%;">Nom scientifique</th>
                                        <th style="width: 7%;">Packing</th>
                                        <th style="width: 5%;">Prix</th>
                                        <th style="width: 5%;">Stock</th>
                                        <th style="width: 5%;">Armoire</th>
                                        <th style="width: 8%;">Categorie</th>
                                        <th style="width: 8%;">Date Expiration</th>
                                        <th style="width: 10%;">Nom Fournisseur</th>
                                        <th style="width: 14%;">Action</th>
                         </tr>
                    </thead>

                    <tbody id="customers_div">
                       @if (count($produits) > 0)
                                 @foreach($produits as $produit)
                                    <tr>
                                
                                    
                                        <td>{{$produit->id}}</td>
                                        <td>{{$produit->nom}} </td>
                                        <td>{{$produit->nom_scientifique}} </td>
                                        <td>{{$produit->packing}}</td>
                                        <td>{{$produit->prix}}</td>
                                        <td>{{$produit->stock}}</td>
                                        <td>{{$produit->armoire}} </td>
                                        <td>{{$produit->categorie}} </td>
                                        <td>{{$produit->date_expiration}}</td>
                                        <td>{{$produit->nom_fournisseur}}</td>
                                        
                                        <td>
                                        <a href="produits/{{$produit->id}}/edit" class="btn btn-info btn-sm" >
                                    
                                        Modifier<!--<i class="fa fa-pencil"></i>-->
                                        </a>
                                        
                                        {!!Form::open(['action' => ['App\Http\Controllers\produitsController@destroy', $produit->id], 'method' => 'POST', 'class' => 'pull-right'])!!} <!--, 'class' => 'pull-right'-->
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Supprimer', ['class' => 'btn btn-danger btn-sm'])}}
                                        {!!Form::close()!!}
                                        
                                        </td>
                                    
                        
                                    </tr>      
                                @endforeach
                                 
                        @else
                             <p>No produits</p>
                        @endif
                        <!-- { {$produits->links()}} -->
               
                    </tbody>
               </table>
              <hr style="border-top: 2px solid #ff5252;">

          </div>
        </div>

       
               
               
               
                              
        

    
     <!-- fin de form et de page -->
      
@endsection 