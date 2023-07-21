

@extends('layouts/appli')

@section('title')
Dashboard
@endsection

@section('titre')
Acceuil
@endsection

@section('sous-titre')
Gestion du pharmacie
@endsection

@section('icon')
handshake
@endsection

@section('content')
    
     
     <!-------->
          
     <div class="row">
          <div class="row col col-xs-8 col-sm-8 col-md-8 col-lg-8">

            
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px">
                    <div class="dashboard-stats" onclick="location.href='clients'">
                      <a class="text-dark text-decoration-none" href="clients">
                        <span class="h4">
                          

                          <?php
                          
                          use Illuminate\Http\Request;
                          
                          use Illuminate\Support\Facades\DB; //il faut l'utiliser qu'une seul fois!! dans les autres db il faut pas declarer, il donne erreur
                          $client = DB::select('select * from clients');
                          $nb = count($client);
                          echo $nb;
                          
                          ?>
                          
                        </span>
                        <span class="h6"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                        <div class="small font-weight-bold">Total Clients</div>
                      </a>
                    </div>
                  </div>
                
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px">
                    <div class="dashboard-stats" onclick="location.href='fournisseurs'">
                      <a class="text-dark text-decoration-none" href="fournisseurs">
                        <span class="h4"><?php
                          $fournisseur = DB::select('select * from fournisseurs');
                          $nb = count($fournisseur);
                          echo $nb;?></span>
                        <span class="h6"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                        <div class="small font-weight-bold">Total Fournisseurs</div>
                      </a>
                    </div>
                  </div> 
                
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px">
                    <div class="dashboard-stats" onclick="location.href='produits'">
                      <a class="text-dark text-decoration-none" href="produits">
                        <span class="h4"><?php
                          $produit = DB::select('select * from produits');
                          $nb = count($produit);
                          echo $nb;?></span>
                        <span class="h6"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                        <div class="small font-weight-bold">Total Produits</div>
                      </a>
                    </div>
                  </div>
                
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px">
                    <div class="dashboard-stats" onclick="location.href='PasDeStock'">
                      <a class="text-dark text-decoration-none" href="PasDeStock">
                        <span class="h4"><?php
                          $stock = DB::select('select * from produits where stock = "0"');
                          $nb = count($stock);
                          echo $nb;?></span>
                        <span class="h6"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                        <div class="small font-weight-bold">En rupture de stock</div>
                      </a>
                    </div>
                  </div>
                
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px">
                    <div class="dashboard-stats" onclick="location.href='expire'">
                      <a class="text-dark text-decoration-none" href="expire">
                        <span class="h4"><?php
                        
                          $date=DATE( NOW() );
                          $stock = DB::select('select * from produits where date_expiration < "'.$date.'"'); //< date()
                          $nb = count($stock);
                          echo $nb;?></span>
                        <span class="h6"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                        <div class="small font-weight-bold">Expirés</div>
                      </a>
                    </div>
                  </div>
                
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px">
                    <div class="dashboard-stats" onclick="location.href='commandes'">
                      <a class="text-dark text-decoration-none" href="commandes">
                        <span class="h4"><?php
                          $commande = DB::select('select * from commandes');
                          $nb = count($commande);
                          echo $nb;?></span>
                        <span class="h6"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                        <div class="small font-weight-bold">Total Commandes</div>
                      </a>
                    </div>
                  </div>

                  
                
          </div>

          <div class="col col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding: 7px 0; margin-left: 15px;">
            <div class="todays-report">
              <div class="h5">Rapport</div>
              <table class="table table-bordered table-striped table-hover">
                <tbody>
                                    <tr>
                                        <th>Total de Profit</th>
                    <th class="text-success"> <?php
                      $p = DB::select('select prix_total from commandes '); //where created_at = ""
                      $profit = 0;
                      if(count($p) > 0){
                                 foreach($p as $pr){
                                  $profit += $pr->prix_total;
                                 }
                                       }
                      echo $profit;?> Dh.</th>
                  </tr>
                  <tr>
                                        <th>Total de Perte</th>
                    <th class="text-danger"> <?php
                      $p = DB::select('select prix_total from achats '); //where created_at = ""
                      $profit = 0;
                      if(count($p) > 0){
                                 foreach($p as $pr){
                                  $profit += $pr->prix_total;
                                 }
                                       }
                      echo $profit;?> Dh.</th>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>

        <hr style="border-top: 2px solid #ff5252;">
        
        <div class="row">

          
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
              		<div class="dashboard-stats" style="padding: 30px 15px;" onclick="location.href='commandes/create'">
              			<div class="text-center">
                      <span class="h1"><i class="fa fa-address-card p-2"></i></span>
              				<div class="h5">Effectuer un commande</div>
              			</div>
              		</div>
                </div>
              
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
              		<div class="dashboard-stats" style="padding: 30px 15px;" onclick="location.href='clients/create'">
              			<div class="text-center">
                      <span class="h1"><i class="fa fa-handshake p-2"></i></span>
              				<div class="h5">Ajouter un client</div>
              			</div>
              		</div>
                </div>
              
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
              		<div class="dashboard-stats" style="padding: 30px 15px;" onclick="location.href='produits/create'">
              			<div class="text-center">
                      <span class="h1"><i class="fa fa-shopping-bag p-2"></i></span>
              				<div class="h5">Ajouter un produit</div>
              			</div>
              		</div>
                </div>
              
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
              		<div class="dashboard-stats" style="padding: 30px 15px;" onclick="location.href='fournisseurs/create'">
              			<div class="text-center">
                      <span class="h1"><i class="fa fa-group p-2"></i></span>
              				<div class="h5">Ajouter un fournisseur</div>
              			</div>
              		</div>
                </div>
              
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
              		<div class="dashboard-stats" style="padding: 30px 15px;" onclick="location.href='achats/create'">
              			<div class="text-center">
                      <span class="h1"><i class="fa fa-bar-chart p-2"></i></span>
              				<div class="h5">Demande de produits</div>
              			</div>
              		</div>
                </div>
              
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
              		<div class="dashboard-stats" style="padding: 30px 15px;" onclick="location.href='RapportCommande'">
              			<div class="text-center">
                      <span class="h1"><i class="fa fa-book p-2"></i></span>
              				<div class="h5">Rapport de vent</div>
              			</div>
              		</div>
                </div>
              
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
              		<div class="dashboard-stats" style="padding: 30px 15px;" onclick="location.href='RapportAchat'">
              			<div class="text-center">
                      <span class="h1"><i class="fa fa-book p-2"></i></span>
              				<div class="h5">Rapport d'achat</div>
              			</div>
              		</div>
                </div>
              
        </div>
        
     
    <hr style="border-top: 2px solid #ff5252;">
     <!-- fin  de page -->
      
@endsection 
 