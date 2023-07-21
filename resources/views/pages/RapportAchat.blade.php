@extends('layouts/appli')

@section('title')
Rapport d'achats
@endsection

@section('titre')
Rapport d'achats
@endsection

@section('sous-titre')
Ordonné par la date de réalisation
@endsection

@section('icon')
handshake
@endsection

@section('content')
     <!-- form content -->
     <div class="row">

          <div class="col col-md-12">
            <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
          </div>

          <div class="col col-md-12 table-responsive">
            <div  class="table-responsive"> <!-- si print ici -->
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

                                        <th style="width: 7%;">Réalisé par</th>
                                        
                                        
                         </tr>
                    </thead>

                    <tbody>

                       @if (count($achats) > 0)
                                 @foreach($achats as $achat)
                                    <tr>
                                
                                    
                                        <td>{{$achat->id}}</td>
                                        <td>{{$achat->nom_fournisseur}} </td>
                                        <td>{{$achat->nom_produit}} </td>
                                        <td>{{$achat->nombre_produits}} </td>
                                        <td>{{$achat->prix_total}}</td>
                                        <td>{{$achat->created_at}}</td>
                                        <td>{{$achat->updated_at}}</td>
                                        
                                        <td>
                                            {{$achat->user->name}}
                                        </td>
                                        
                                        
                                       
                                    
                        
                                    </tr>      
                                @endforeach
                                 
                        @else
                             <p>No achats</p>
                        @endif
                        <!-- { {$achats->links()}} -->
               
                    </tbody>
    <tfoot class="font-weight-bold">
      <tr style="text-align: right; font-size: 24px;">
        <td colspan="4" style="color: green;">&nbsp;Total de Perte =</td>
        <td style="color: red;"><?php
                                   use Illuminate\Http\Request;
                          
                                    use Illuminate\Support\Facades\DB;
                                   $p = DB::select('select prix_total from achats '); //where created_at = ""
                                   $profit = 0;
                                   if(count($p) > 0){
                                             foreach($p as $pr){
                                             $profit += $pr->prix_total;
                                             }
                                                  }
                                   echo $profit;?>
          </td>
      </tr>
    </tfoot>
                	</table>
                  <button class="btn btn-success col col-md-1" onclick="window.print()">Imprimer</button> 

                  <div class="col col-md-12">
                    <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
                  </div>
                  <hr style="border-top: 2px solid #ff5252;">
            </div>
          </div>
          
          
        <!-- form content end -->
     <!-- form de ajouter produit -->
    
     <!-- fin de form et de page -->
      
@endsection 
 