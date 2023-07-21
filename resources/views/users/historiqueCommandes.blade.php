@extends('layouts/appli')

@section('title')
Commandes de {{$user->name}}
@endsection

@section('titre')
Commandes de {{$user->name}} : ordonnées par la date de creation
@endsection

@section('sous-titre')
Gérer ces commandes
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
                                        <th style="width: 5%;">Commande ID</th>
                                        <th style="width: 15%;">Nom de client</th>
                                        <th style="width: 15%;">Nom de produit</th>
                                        <th style="width: 7%;">Quantité</th>
                                        <th style="width: 5%;">Prix Total</th>
                                        <th style="width: 5%;">Date de commande</th>
                                        <th style="width: 5%;">Date de Modification</th>

                                    
                                        
                                        <th style="width: 10%;">Action</th>
                         </tr>
                    </thead>

                    <tbody>
                        <?php
                    
                              use Illuminate\Http\Request;
                              use Illuminate\Support\Facades\DB; //il faut l'utiliser qu'une seul fois!! dans les autres db il faut pas declarer, il donne erreur
                              
                              
                              $commandes = DB::select('select * from commandes where user_id ="'.$user->id.'" order by created_at desc');
                              //$nb = count($commandes);
                              //echo $nb;
                              
                              if(count($commandes) > 0){
                                  foreach($commandes as $commande){
                                      echo '<tr>';
                                               echo '<td>'  .$commande->id. '</td>'; 
                                               
                                               echo '<td>'.$commande->nom_client. '</td>';
                                               echo '<td>'.$commande->nom_produit. '</td>';
                                               echo '<td>'.$commande->nombre_produits. '</td>';
                                               echo '<td>'.$commande->prix_total.'</td>';
                                               echo '<td>'.$commande->created_at.'</td>';
                                               echo '<td>'.$commande->updated_at.'</td>';
                                               echo ' <td><a href="/pfe/public/commandes/'.$commande->id.'/edit" class="btn btn-info btn-sm" >Modifier	</a> </td>';

                                      echo '</tr> ';      
                                                
                                       
                                               
                                  }
                              }else{echo "No commandes  ";}
                             
                                  ?>         
                            </tbody>
               </table>
          </div>
        </div>

      </div> 
               
               
               
                              
        

    <hr style="border-top: 2px solid #ff5252;">
     <!-- fin de form et de page -->
      
@endsection 