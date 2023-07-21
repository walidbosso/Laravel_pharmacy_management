@extends('layouts/appli')

@section('title')
Produit
@endsection

@section('titre')
Produit 
@endsection

@section('sous-titre')
Resultats de Recherche
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
                                        <th style="width: 15%;">Nom</th>
                                        <th style="width: 18%;">Nom scientifique</th>
                                        <th style="width: 7%;">Packing</th>
                                        <th style="width: 5%;">Prix</th>
                                        <th style="width: 5%;">Stock</th>
                                        <th style="width: 5%;">Armoire</th>
                                        <th style="width: 8%;">Categorie</th>
                                        <th style="width: 5%;">Date Expiration</th>
                                        <th style="width: 13%;">Nom Fournisseur</th>
                                        <th style="width: 14%;">Action</th>
                    </thead>

                    <tbody>
                       @if (count($produits) > 0)
                              @foreach ($produits as $produit)  
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
          </div>
        </div>

      </div> 
               
    <hr style="border-top: 2px solid #ff5252;">
     <!-- fin de form et de page -->
      
@endsection 