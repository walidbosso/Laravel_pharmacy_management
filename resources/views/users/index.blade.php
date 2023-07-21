@extends('layouts/appli')

@section('title')
Gestion des utilisateurs
@endsection

@section('titre')
Gestion des utilisateurs
@endsection

@section('sous-titre')

@endsection

@section('icon')
edit
@endsection

@section('content')

<div class="row">
     <div class="row col col-md-6">
          
        <!--  { !! Form::open(['action' => 'App\Http\Controllers\PagesController@rechercheruser', 'method' => 'GET', ]) !!}
                    <div class="form-group">
                         { {Form::label('name', 'Rechercher un user: ')}}
                         

                    
                              <select name="name" id="name" class = "form-control">
                                   <option disabled selected hidden> Selectioner un user </option>
                                   < ?php
                                    
                                   use Illuminate\Http\Request;
                                   use Illuminate\Support\Facades\DB; //il faut l'utiliser qu'une seul fois!! dans les autres db il faut pas declarer, il donne erreur
                                   
                                   
                                   $cls = DB::select('select name from users order by name');
                                   //$nb = count($produits);
                                   //echo $nb;
                                   if(count($cls) > 0){
                                       foreach($cls as $cl){
                                          
                                                    echo '<option>'  .$cl->name. '</option>'; 
                                                   
                                       }
                                   }else{echo "No users dans BD  ";}
                                   
                                   ?>
          
                              </select>
                    </div>
                    
                    <br>
                     { {Form::hidden('_method','PUT')}} car get/head dans route

                    { {Form::submit('Executer', ['class'=>'btn btn-primary'])}}

          { !! Form::close() !!}
                -->           
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
                  <th style="width: 7%;">Utilisateur ID</th>
                  <th style="width: 17%;">Nom</th>
                  <th style="width: 10%;">Role</th>
                  <th style="width: 10%;">Email</th>
                  <th style="width: 23%;">Date d'inscription</th>
                  <th style="width: 10%;">Date de modification</th>
                  <th style="width: 5%;">Achats réalisés</th>
                  <th style="width: 5%;">Commandes supervisés</th>
                  <th style="width: 5%;">Devenir Admin </th>
                  <th style="width: 13%;">Action</th>
                         </tr>
                    </thead>

                    <tbody>
                       @if (count($users) > 0)
                                 @foreach($users as $user)
                                    <tr>
                                
                                    
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}} </td>
                                        <td>{{$user->role}} </td>
                                        <td>{{$user->email}} </td>
                                        <td>{{$user->created_at}}</td>
                                        <td>{{$user->updated_at}}</td>
                                        
                                       
                                       <td> <a href="users/{{$user->id}}/historiqueAchats" class="btn btn-warning btn-sm" >Afficher</a></td>
                                       <td> <a href="users/{{$user->id}}/historiqueCommandes" class="btn btn-warning btn-sm" >Afficher</a></td>


                                       <td> {!!Form::open(['action' => ['App\Http\Controllers\usersController@admin', $user->id], 'method' => 'PUT', 'class' => 'pull-right'])!!} <!--, 'class' => 'pull-right'-->
                                        
                                        {{Form::submit('Valider', ['class' => 'btn btn-info btn-sm"'])}}
                                        {!!Form::close()!!}
                                       </td>


                                       <td>
                                        
                                        {!!Form::open(['action' => ['App\Http\Controllers\usersController@destroy', $user->id], 'method' => 'POST', 'class' => 'pull-right'])!!} <!--, 'class' => 'pull-right'-->
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Supprimer', ['class' => 'btn btn-danger btn-sm'])}}
                                        {!!Form::close()!!}
                                        
                                        </td>
                                    
                        
                                    </tr>      
                                @endforeach
                                 
                        @else
                             <p>No users</p>
                        @endif
                        <!-- { {$users->links()}} -->
                        
               
                    </tbody>
               </table>
          </div>
        </div>

      </div> 
        <!--{ { $users->links() }}       -->
    <hr style="border-top: 2px solid #ff5252;">
     <!-- fin de form et de page -->
      
@endsection 