@extends('layouts/appli')

@section('title')
Produits
@endsection

@section('titre')
Produits
@endsection

@section('sous-titre')
Ajouter des produits
@endsection

@section('icon')
handshake
@endsection

@section('content')

<div class="row">
     <div class="row col col-md-6">
          
          {!! Form::open(['action' => 'App\Http\Controllers\produitsController@store', 'method' => 'POST', ]) !!}
               <div class="form-group">
                    {{Form::label('nom', 'Nom de produit: ')}}
                    {{Form::text('nom', '', ['class' => 'form-control', 'placeholder' => 'ex: Douliprane'])}}
               </div>
               <div class="form-group">
                    {{Form::label('nom_scientifique', 'Le Nom Scientifique: ')}}
                    {{Form::text('nom_scientifique', '', [ 'class' => 'form-control', 'placeholder' => 'ex: Paracetamol'])}}
               </div>
               <div class="form-group">
                    {{Form::label('packing', ' La nombre des pills/volume et La densite ')}}
                    {{Form::text('packing', '', [ 'class' => 'form-control', 'placeholder' => '10 pills/75mg'])}}
               </div>
               <div class="form-group">
                    {{Form::label('prix', 'Prix: ')}}
                    {{Form::text('prix', '', [ 'class' => 'form-control', 'placeholder' => '120.75'])}}
               </div>
               <div class="form-group">
                    {{Form::label('stock', 'Quantite de produit dans stock: ')}}
                    {{Form::text('stock', '', ['class' => 'form-control', 'placeholder' => '3'])}}
               </div>
               <div class="form-group">
                    {{Form::label('armoire', 'Armoire/Emplacement: ')}}
                    {{Form::text('armoire', '', [ 'class' => 'form-control', 'placeholder' => 'A1'])}}
               </div>
               <div class="form-group">
                    {{Form::label('categorie', 'Categorie: ')}}
                    {{Form::text('categorie', '', [ 'class' => 'form-control', 'placeholder' => 'ex: Douleurs'])}}
               </div>
               <div class="form-group">
                    {{Form::label('date_expiration', 'La date expiration: ')}}
                    {{Form::date('date_expiration', '', [ 'class' => 'form-control'])}}
               </div>
               <div class="form-group">
                    {{Form::label('nom_fournisseur', 'Nom de fournisseur: ')}}
                    <select name="nom_fournisseur" id="nom_fournisseur" class = "form-control">
                         <option disabled selected hidden> Selectioner un fournisseur </option>
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

                    </select>
                    
                   
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