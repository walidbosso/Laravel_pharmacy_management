@extends('layouts/appli')

@section('title')
Commandes de {{$client->name}}
@endsection

@section('titre')
{{$client->name}}
@endsection

@section('sous-titre')
Historique des commandes
@endsection

@section('icon')
edit
@endsection

@section('content')


     <!-- form  -->
     <div class="row">
     
        
          


            
    
            <div class="col col-md-12 table-responsive">
              <div class="table-responsive">
                   <table class="table table-bordered table-striped table-hover">
                        <thead>
                             <tr>
                      <!-- <th style="width: 2%;">SL.</th>-->
                      <th style="width: 7%;">Client ID</th>
                      <th style="width: 17%;">Nom</th>
                      <th style="width: 23%;">Email</th>
                      <th style="width: 10%;">Telephone</th>
                      <th style="width: 22%;">Addresse</th>
                      
                        </thead>
    
                        <tbody>
                           <u><strong>Informations personnelles:</strong></u><br>
                                        <tr>
                                    
                                        
                                            <td>{{$client->id}}</td>
                                            <td>{{$client->name}} </td>
                                            <td>{{$client->email}} </td>
                                            <td>{{$client->telephone}}</td>
                                            <td>{{$client->addresse}}</td>
                                           
                                           
                                        
                            
                                        </tr>      
                                    
                            <!-- { {$clients->links()}} -->
                   
                        </tbody>
                   </table>
                </div>
            </div>

                    <div class="col col-md-12">
                    <hr class="col-md-12" style="padding: 0px; border-top: 5px solid  #02b6ff;">
                    <div class="col col-md-12 table-responsive">
                        <div class="table-responsive">
                             <table class="table table-bordered table-striped table-hover">
                              <u><strong>Commandes:</strong></u><br>
                                  <thead>
                                       <tr>
                                <!-- <th style="width: 2%;">SL.</th>-->
                                                      <th style="width: 5%;">commande ID</th>
                                                      
                                                      <th style="width: 15%;">Nom de produit</th>
                                                      <th style="width: 7%;">Quantité</th>
                                                      <th style="width: 5%;">Prix Total</th>
                                                      <th style="width: 5%;">Date de commande</th>
                                                      
              
                                                      
                                       </tr>
                                  </thead>
              
                                  <tbody>
                              <?php
                          
                                    use Illuminate\Http\Request;
                                    use Illuminate\Support\Facades\DB; //il faut l'utiliser qu'une seul fois!! dans les autres db il faut pas declarer, il donne erreur
                                    
                                    
                                    $commandes = DB::select('select * from commandes where client_id ="'.$client->id.'" order by created_at desc');
                                    //$nb = count($commandes);
                                    //echo $nb;
                                    $profit = 0;
                                    if(count($commandes) > 0){
                                        foreach($commandes as $commande){
                                            echo '<tr>';
                                                     echo '<td>'  .$commande->id. '</td>'; 
                                                     
                                                     echo '<td>'.$commande->nom_produit. '</td>';
                                                     echo '<td>'.$commande->nombre_produits. '</td>';
                                                     echo '<td>'.$commande->prix_total.'</td>';
                                                     echo '<td>'.$commande->created_at.'</td>';
                                                     
                                            echo '</tr> ';      
                                                      
                                            $profit += $commande->prix_total;      
                                                     
                                        }
                                    }else{echo "No commandes  ";}
                                    echo  '<tr style="text-align: right; font-size: 24px;">
                                             <td colspan="3" style="color: green;">&nbsp;Total  =</td>
                                             <td style="color: red;"> '.$profit.' </td>
                                              
                                        </tr>';
                                        ?>         
                                  </tbody>
                             </table>
                             
                             <div class="col col-md-12">
                              <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
                            </div>
                             <button class="btn btn-success col col-md-1" onclick="window.print()">Imprimer</button> 

                            
                         
                        </div>
                      </div>

                   
        </div>


       

      </div> 
               
     
               
                              
        

    <hr style="border-top: 2px solid #ff5252;">
     <!-- fin de form et de page -->
      
@endsection 