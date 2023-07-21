@extends('layouts/appli')

@section('title')
Produits de {{$fournisseur->name}}
@endsection

@section('titre')
Rapport
@endsection

@section('sous-titre')
L'ensemble des produits de {{$fournisseur->name}}
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
                        
                    <u><strong>Informations sur Fournisseur:</strong></u><br>
                        <thead>
                             <tr>
                      <!-- <th style="width: 2%;">SL.</th>-->
                      <th style="width: 7%;">fournisseur ID</th>
                      <th style="width: 17%;">Nom</th>
                      <th style="width: 23%;">Email</th>
                      <th style="width: 10%;">Telephone</th>
                      <th style="width: 22%;">Addresse</th>
                      
                        </thead>
    
                        <tbody>
                        
                                        <tr>
                                    
                                        
                                            <td>{{$fournisseur->id}}</td>
                                            <td>{{$fournisseur->name}} </td>
                                            <td>{{$fournisseur->email}} </td>
                                            <td>{{$fournisseur->telephone}}</td>
                                            <td>{{$fournisseur->addresse}}</td>
                                           
                                           
                                        
                            
                                        </tr>      
                                    
                            <!-- { {$fournisseurs->links()}} -->
                   
                        </tbody>
                   </table>
                </div>
            </div>

                    <div class="col col-md-12">
                    <hr class="col-md-12" style="padding: 0px; border-top: 5px solid  #02b6ff;">
                    <div class="col col-md-12 table-responsive">
                        <div class="table-responsive">
                             <table class="table table-bordered table-striped table-hover">
                                  <thead>
                                    <u><strong>Produits:</strong></u><br>
                                       <tr>
                                <!-- <th style="width: 2%;">SL.</th>-->
                                <th style="width: 5%;">Produit ID</th>
                                <th style="width: 15%;">Nom</th>
                                <th style="width: 18%;">Nom scientifique</th>
                                <th style="width: 18%;">Densité</th>
                                
                                <th style="width: 5%;">Prix</th>
                                
                                
                                                      
              
                                                      
                                       </tr>
                                  </thead>
              
                                  <tbody>

                                    <?php
                          
                                    use Illuminate\Http\Request;
                                    use Illuminate\Support\Facades\DB; //il faut l'utiliser qu'une seul fois!! dans les autres db il faut pas declarer, il donne erreur
                                    
                                    
                                    $produits = DB::select('select * from produits where fournisseur_id ="'.$fournisseur->id.'"');
                                    //$nb = count($produits);
                                    //echo $nb;
                                    if(count($produits) > 0){
                                        foreach($produits as $produit){
                                            echo '<tr>';
                                                     echo '<td>'  .$produit->id. '</td>'; 
                                                     
                                                     echo '<td>'.$produit->nom. '</td>';
                                                     echo '<td>'.$produit->nom_scientifique. '</td>';
                                                     echo '<td>'.$produit->packing. '</td>';
                                                     echo '<td>'.$produit->prix.'</td>';
                                                     
                                                     
                                            echo '</tr> ';      
                                                      
                                                      
                                                     
                                        }
                                    }else{echo "No produits <br> ";}
                                    
                                    ?>

                             
                                  </tbody>
                             </table>
                        </div>
                      </div>

                   
        </div>


       

      </div> 
               
     
               
                              
        

    <hr style="border-top: 2px solid #ff5252;">
     <!-- fin de form et de page -->
      
@endsection 