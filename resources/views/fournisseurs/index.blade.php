@extends('layouts/appli')

@section('title')
Fournisseurs
@endsection

@section('titre')
Fournisseurs
@endsection

@section('sous-titre')
Gérer les fournisseurs
@endsection

@section('icon')
edit
@endsection

@section('content')


     <!-- form  -->
     <div class="row">
     
          <div class="row">
               <div class="row col col-md-6">
                    
                    {!! Form::open(['action' => 'App\Http\Controllers\PagesController@rechercherFournisseur', 'method' => 'GET', ]) !!}
                              <div class="form-group">
                                   {{Form::label('name', 'Rechercher: ')}}
                              
                         

                    
                              <select name="name" id="name" class = "form-control">
                                  <option disabled selected hidden> Selectioner un fournisseur </option>
                                   <?php
                                    
                                   use Illuminate\Http\Request;
                                   use Illuminate\Support\Facades\DB; //il faut l'utiliser qu'une seul fois!! dans les autres db il faut pas declarer, il donne erreur
                                   
                                   
                                   $cls = DB::select('select name from fournisseurs order by name');
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
                              
                              <br>
                              <!--{{Form::hidden('_method','PUT')}}  car get/head dans route-->
          
                              {{Form::submit('Executer', ['class'=>'btn btn-primary'])}}
          
                    {!! Form::close() !!}
                                   
               </div>
          </div>  
        <div class="col col-md-12">
          <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
        </div>

        <div class="col col-md-12 table-responsive">
          <div class="table-responsive">
               <table class="table table-bordered table-striped table-hover">
                    <thead>
                         <tr>
                  <!-- <th style="width: 2%;">SL.</th>-->
                  <th style="width: 7%;">Fournisseur ID</th>
                  <th style="width: 17%;">Nom</th>
                  <th style="width: 20%;">Email</th>
                  <th style="width: 10%;">Telephone</th>
                  <th style="width: 16%;">Addresse</th>
                  <th style="width: 7%;">Nombre de produits</th>
                  <th style="width: 7%;">Produits
               </th>
                  <th style="width: 13%;">Action</th>
                         </tr>
                    </thead>

                    <tbody id="customers_div">
                       @if (count($fournisseurs) > 0)
                                 @foreach($fournisseurs as $fournisseur)
                                    <tr>
                                
                                    
                                        <td>{{$fournisseur->id}}</td>
                                        <td>{{$fournisseur->name}} </td>
                                        <td>{{$fournisseur->email}} </td>
                                        <td>{{$fournisseur->telephone}}</td>
                                        <td>{{$fournisseur->addresse}}</td>

                                        <td>  <?php
                                             
                                             $produit = DB::select('select * from produits where fournisseur_id = '.$fournisseur->id.'');
                                             $nb = count($produit);
                                             echo $nb;?>
                                        </td>

                                        <td> <a href="fournisseurs/{{$fournisseur->id}}/produits" class="btn btn-warning btn-sm" >Afficher</a></td>
                                        
                                        <td>
                                        <a href="fournisseurs/{{$fournisseur->id}}/edit" class="btn btn-info btn-sm" >
                                    
                                        Modifier<!--<i class="fa fa-pencil"></i>-->
                                        </a>
                                        
                                        {!!Form::open(['action' => ['App\Http\Controllers\fournisseursController@destroy', $fournisseur->id], 'method' => 'POST', 'class' => 'pull-right'])!!} <!--, 'class' => 'pull-right'-->
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Supprimer', ['class' => 'btn btn-danger btn-sm'])}}
                                        {!!Form::close()!!}
                                        
                                        </td>
                                    
                        
                                    </tr>      
                                @endforeach
                                 
                        @else
                             <p>No fournisseurs</p>
                        @endif
                        <!-- { {$fournisseurs->links()}} -->
               
                    </tbody>
               </table>
          </div>
        </div>

      </div> 
               
               
               
                              
        

    <hr style="border-top: 2px solid #ff5252;">
     <!-- fin de form et de page -->
      
@endsection 