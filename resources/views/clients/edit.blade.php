@extends('layouts/appli')

@section('title')
Modifier un client
@endsection

@section('titre')
Client
@endsection

@section('sous-titre')
Modifier les données d'un client
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
                                        <th style="width: 15%;">Nom</th>
                                        <th style="width: 20%;">Email</th>
                                        <th style="width: 15%;">Telephone</th>
                                        <th style="width: 30%;">Addresse</th>
                                        <th style="width: 13%;">Action</th>
                                     </tr>
                                </thead>
                                <tbody id="customers_div">
                                       
                                         <tr>
                                             
                                             {!! Form::open(['action' => ['App\Http\Controllers\clientsController@update', $client->id], 'method' => 'POST', ]) !!}
                                                       
                                                       <td>{{$client->id}}</td>
                                                       
                                                       <td>{{Form::text('name', $client->name, ['class' => 'form-control', 'placeholder' => 'nom'])}}</td>
                                                       
                                                       <td>{{Form::text('email', $client->email, ['class' => 'form-control', 'placeholder' => 'email'])}}</td>
                                                       
                                                       <td>{{Form::text('telephone', $client->telephone, ['class' => 'form-control', 'placeholder' => 'telephone'])}}</td>
                                                       
                                                       <td>{{Form::text('addresse', $client->addresse, ['class' => 'form-control', 'placeholder' => 'addresse'])}}</td>
                                                            
                                                  {{Form::hidden('_method','PUT')}}

                                                       <td>{{Form::submit('Valider', ['class'=>'btn btn-primary'])}}
                                                                 <a href="/pfe/public/clients" class="btn btn-info btn-sm" >
                                                                      Annuler
                                                                 </a>
                                                        </td>
                                                            
                                                       
                                             {!! Form::close() !!}
                                        </tr>             
                             
                                </tbody>
                           </table>
                      </div>
                    </div>
          
                  </div>
               
                              
        

    <hr style="border-top: 2px solid #ff5252;">
     <!-- fin de form et de page -->
      
@endsection 