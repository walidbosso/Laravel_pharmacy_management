@extends('layouts/appli')

@section('title')
Clients
@endsection

@section('titre')
Clients
@endsection

@section('sous-titre')
Gérer les Clients
@endsection

@section('icon')
edit
@endsection

@section('content')

<div class="row">
     <div class="row col col-md-6">
          
          {!! Form::open(['action' => 'App\Http\Controllers\PagesController@rechercherClient', 'method' => 'GET', ]) !!}
                    <div class="form-group">
                         {{Form::label('name', 'Rechercher un client: ')}}
                         

                    
                              <select name="name" id="name" class = "form-control">
                                   <option disabled selected hidden> Selectioner un client </option>
                                   <?php
                                    
                                   use Illuminate\Http\Request;
                                   use Illuminate\Support\Facades\DB; //il faut l'utiliser qu'une seul fois!! dans les autres db il faut pas declarer, il donne erreur
                                   
                                   
                                   $cls = DB::select('select name from clients order by name');
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
                    <!-- { {Form::hidden('_method','PUT')}} car get/head dans route-->

                    {{Form::submit('Executer', ['class'=>'btn btn-primary'])}}

          {!! Form::close() !!}
                         
     </div>
</div>  

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
                  <th style="width: 7%;">Client ID</th>
                  <th style="width: 17%;">Nom</th>
                  <th style="width: 23%;">Email</th>
                  <th style="width: 10%;">Telephone</th>
                  <th style="width: 17%;">Addresse</th>
                  <th style="width: 5%;">Nombre de commandes</th>
                  <th style="width: 5%;">Historique
				  </th>
                  <th style="width: 13%;">Action</th>
                         </tr>
                    </thead>

                    <tbody>
                       @if (count($clients) > 0)
                                 @foreach($clients as $client)
                                    <tr>
                                
                                    
                                        <td>{{$client->id}}</td>
                                        <td>{{$client->name}} </td>
                                        <td>{{$client->email}} </td>
                                        <td>{{$client->telephone}}</td>
                                        <td>{{$client->addresse}}</td>
                                        <td>  <?php
                                             
                                             $cl = DB::select('select * from commandes where client_id = '.$client->id.'');
                                             $nb = count($cl);
                                             echo $nb;?>
                                        </td>
                                       <td> <a href="clients/{{$client->id}}/historique" class="btn btn-warning btn-sm" >Afficher</a></td>
                                        <td>
                                        <a href="clients/{{$client->id}}/edit" class="btn btn-info btn-sm" >
                                    
                                        Modifier<!--<i class="fa fa-pencil"></i>-->
                                        </a>
                                        
                                        {!!Form::open(['action' => ['App\Http\Controllers\clientsController@destroy', $client->id], 'method' => 'POST', 'class' => 'pull-right'])!!} <!--, 'class' => 'pull-right'-->
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Supprimer', ['class' => 'btn btn-danger btn-sm'])}}
                                        {!!Form::close()!!}
                                        
                                        </td>
                                    
                        
                                    </tr>      
                                @endforeach
                                 
                        @else
                             <p>No clients</p>
                        @endif
                        <!-- { {$clients->links()}} -->
                        
               
                    </tbody>
               </table>
          </div>
        </div>

      </div> 
        {{ $clients->links() }}       
    <hr style="border-top: 2px solid #ff5252;">
     <!-- fin de form et de page -->
      
@endsection 