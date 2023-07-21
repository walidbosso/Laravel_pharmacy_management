@extends('layouts/appli')

@section('title')
Achats de {{$user->name}}
@endsection

@section('titre')
Achats de {{$user->name}}: ordonnées par la date de création
@endsection

@section('sous-titre')
Gérer ces achats
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
                                        <th style="width: 5%;">Achat ID</th>
                                        <th style="width: 15%;">Nom de fournisseur</th>
                                        <th style="width: 15%;">Nom de produit</th>
                                        <th style="width: 7%;">Quantité</th>
                                        <th style="width: 5%;">Prix Total</th>
                                        <th style="width: 5%;">Date de achat</th>
                                        <th style="width: 5%;">Date de Modification</th>

                                    
                                        
                                        <th style="width: 10%;">Action</th>
                         </tr>
                    </thead>

                    <tbody>
                        <?php
                    
                              use Illuminate\Http\Request;
                              use Illuminate\Support\Facades\DB; //il faut l'utiliser qu'une seul fois!! dans les autres db il faut pas declarer, il donne erreur
                              
                              
                              $achats = DB::select('select * from achats where user_id ="'.$user->id.'" order by created_at desc');
                              //$nb = count($achats);
                              //echo $nb;
                              
                              if(count($achats) > 0){
                                  foreach($achats as $achat){
                                      echo '<tr>';
                                               echo '<td>'  .$achat->id. '</td>'; 
                                               
                                               echo '<td>'.$achat->nom_fournisseur. '</td>';
                                               echo '<td>'.$achat->nom_produit. '</td>';
                                               echo '<td>'.$achat->nombre_produits. '</td>';
                                               echo '<td>'.$achat->prix_total.'</td>';
                                               echo '<td>'.$achat->created_at.'</td>';
                                               echo '<td>'.$achat->updated_at.'</td>';
                                               echo ' <td><a href="/pfe/public/achats/'.$achat->id.'/edit" class="btn btn-info btn-sm" >Modifier	</a> </td>';

                                      echo '</tr> ';      
                                                
                                       
                                               
                                  }
                              }else{echo "No achats  ";}
                             
                                  ?>         
                            </tbody>
               </table>
          </div>
        </div>

      </div> 
               
               
               
                              
        

    <hr style="border-top: 2px solid #ff5252;">
     <!-- fin de form et de page -->
      
@endsection 