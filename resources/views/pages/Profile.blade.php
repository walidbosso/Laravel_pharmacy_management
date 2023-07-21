
@extends('layouts/appli')
@section('title')
Profile: {{auth()->user()->name}}
@endsection
@section('titre')
Profile: {{auth()->user()->name}}
@endsection
@section('sous-titre')
Espace personnelle
@endsection

@section('icon')
home
@endsection

@section('content')
<div clas="container">
	
	<div class="row">
		<div class="col-md-12">


			<div class="card profile-header bg-white">
				<div class="card-body row align-items-center">
					<div class="col-auto profile-image">
						<a href="#">
							<img class="rounded-circle" width="90" alt="User Image" src="../images/logo.png">
						</a>
					</div>
					<div class="col ml-md-n2 profile-user-info">
						<h4 class="user-name mb-0">{{auth()->user()->name}}</h4>
						<h6 class="text-muted">{{auth()->user()->email}}</h6>
						TimeZone: <h5>{{date_default_timezone_get()}}</h5>
						La date et temps actuelle: <h5>{{date('d M,Y h:i:s a', time())}}</h5>
						<a href="pages/{{auth()->user()->id}}/modifierProfil" class="btn btn-danger btn-sm" > Modifier Profil</a><!--<i class="fa fa-pencil"></i>-->
						


						@if(Auth::user()->role == "admin")
						
						<a href="users" class="btn btn-success btn-sm" >Gérer les utilisateurs</a>
						@endif




					</div>

				</div>
			</div>


			<!--Achats effectué-->

			
		</div>
				<div class="col col-md-12">
					<hr style="border-top: 2px solid #ff5252;">
				</div>
			
			<div class="col col-md-12">
				<hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
			</div>





			<div class="col col-md-12">
				<Strong><u>Achats Réalisés</u></Strong>
			</div>
				<div class="col col-md-12">
					<hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
				</div>
			<div class="col col-md-12 table-responsive">
				<div id="print_content" class="table-responsive">
					<table class="table table-bordered table-striped table-hover" id="purchase_report_div">
					
						<thead>
							<tr>
									
											<th style="width: 5%;">Achat ID</th>
											<th style="width: 15%;">Nom de fournisseur</th>
											<th style="width: 15%;">Nom de produit</th>
											<th style="width: 7%;">Quantité</th>
											<th style="width: 5%;">Prix Total</th>
											<th style="width: 7%;">Date de achat</th>
											<th style="width: 7%;">Date de Modification</th>

											<th style="width: 5%;">Action</th>
											
											
							</tr>
						</thead>

						<tbody>
							<?php
							
								use Illuminate\Http\Request;
								use Illuminate\Support\Facades\DB; //il faut l'utiliser qu'une seul fois!! dans les autres db il faut pas declarer, il donne erreur
								
								$id=auth()->user()->id;

								$commands = DB::select('select * from achats where user_id ="'.$id.'" order by created_at desc');
								//$nb = count($commandes);
								//echo $nb;
								if(count($commands) > 0){
									foreach($commands as $command){
										echo '<tr>';
												echo '<td>'  .$command->id. '</td>'; 
												echo '<td>'.$command->nom_fournisseur. '</td>';
												echo '<td>'.$command->nom_produit. '</td>';
												echo '<td>'.$command->nombre_produits. '</td>';
												echo '<td>'.$command->prix_total.'</td>';
												echo '<td>'.$command->created_at.'</td>';
												echo '<td>'.$command->updated_at.'</td>';
												echo ' <td><a href="achats/'.$command->id.'/edit" class="btn btn-info btn-sm" >
																Modifier</a></td>';
														
												
													
												
										echo '</tr> ';      
												
												
												
									}
								}
							
							?>
						</tbody>
					</table>
			
			
				<div class="col col-md-12">
					<hr style="border-top: 2px solid #ff5252;">
				</div>
					
				<div class="col col-md-12 table-responsive">
						
							<table class="table table-bordered table-striped table-hover" >
					
								<thead><div class="col col-md-12">
									<hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
									</div><Strong><u>Commandes supervisés</u></Strong><div class="col col-md-12">
									<hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
						
									<tr>
									
											<th style="width: 5%;">Commande ID</th>
											<th style="width: 15%;">Nom de client</th>
											<th style="width: 15%;">Nom de produit</th>
											<th style="width: 7%;">Quantité</th>
											<th style="width: 5%;">Prix Total</th>
											<th style="width: 7%;">Date de achat</th>
											<th style="width: 7%;">Date de Modification</th>

											<th style="width: 5%;">Action</th>
											
											
									</tr>
								</thead>

						<tbody>
							<?php
							
								
								$id=auth()->user()->id;

								$commandes = DB::select('select * from commandes where user_id ="'.$id.'" order by created_at desc');
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
												echo ' <td><a href="commandes/'.$commande->id.'/edit" class="btn btn-info btn-sm" >Modifier	</a> </td>';
												
												
												
									}
								}
							
							?>


						
				
						</tbody>
				</table>

			


					<div class="col col-md-12">
						<hr style="border-top: 2px solid #ff5252;">
					
					</div>

					
				  

			</div>




		</div>	
		</div>
	</div>
</div>
@endsection