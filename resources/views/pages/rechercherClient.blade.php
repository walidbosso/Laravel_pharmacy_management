@extends('layouts/appli')

@section('title')
Clients
@endsection

@section('titre')
Resultat pour: {{$client[0]->name}}
@endsection

@section('sous-titre')

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
                  <th style="width: 7%;">Client ID</th>
                  <th style="width: 17%;">Nom</th>
                  <th style="width: 23%;">Email</th>
                  <th style="width: 10%;">Telephone</th>
                  <th style="width: 22%;">Addresse</th>
                  <th style="width: 5%;">Historique
				  </th>
                  <th style="width: 13%;">Action</th>
                         </tr>
                    </thead>

                    <tbody>
                       @if (count($client) > 0)
                              <!--@ foreach-->    
                                    <tr>
                                
                                    
                                        <td>{{$client[0]->id}}</td>
                                        <td>{{$client[0]->name}} </td>
                                        <td>{{$client[0]->email}} </td>
                                        <td>{{$client[0]->telephone}}</td>
                                        <td>{{$client[0]->addresse}}</td>
                                       
                                       <td> <a href="clients/{{$client[0]->id}}/historique" class="btn btn-warning btn-sm" >Afficher</a></td>
                                        <td>
                                        <a href="clients/{{$client[0]->id}}/edit" class="btn btn-info btn-sm" >
                                    
                                        Modifier<!--<i class="fa fa-pencil"></i>-->
                                        </a>
                                        
                                        {!!Form::open(['action' => ['App\Http\Controllers\clientsController@destroy', $client[0]->id], 'method' => 'POST', 'class' => 'pull-right'])!!} <!--, 'class' => 'pull-right'-->
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Supprimer', ['class' => 'btn btn-danger btn-sm'])}}
                                        {!!Form::close()!!}
                                        
                                        </td>
                                    
                        
                                    </tr>      
                                
                          <!--@ endforeach-->       
                        @else
                             <p>No clients</p>
                        @endif
                        <!-- { {$clients->links()}} -->
               
                    </tbody>
               </table>
          </div>
        </div>

      </div> 
               
    <hr style="border-top: 2px solid #ff5252;">
     <!-- fin de form et de page -->
      
@endsection 