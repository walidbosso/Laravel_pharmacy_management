<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;


class clientsController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = client::orderBy('name','asc')->simplePaginate(10);
        return view('clients/index')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('clients/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'max:100',
            'addresse' => 'max:100',
            'telephone' => 'max:13'

        ]);
        //
        //return "all good!" ; 
        $client = new client; //creation d'une instance/ligne dans bd table client sera stocker dans variable
        $client->name = $request->input('name'); //attribut name il faut que sera identique avec le nom de attribut, et input avec form
        $client->addresse = $request->input('addresse');
        $client->email = $request->input('email');
        $client->telephone = $request->input('telephone');
        //$client->user_id = auth()->user()->id;
        $client->save();

        return redirect('/clients')->with('success', 'Vous avez ajouté '.$client->name.'.'); //@include('include/messages') dans layout app choisi la place que tu veux apres yield content ou avant
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $client = client::find($id);
        
        //Check if client exists before deleting
        if (!isset($client)){
            return redirect('clients')->with('error', 'Pas de client trouvé');
        }

        // Check for correct user
        //if(auth()->user()->id !==$client->user_id){
       //     return redirect('/clients')->with('error', 'Unauthorized Page');
       // }

        return view('clients/edit')->with('client', $client);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'max:100',
            'addresse' => 'max:100',
            'telephone' => 'max:13'

        ]);
        //
        //return "all good!" ; 
        $client = client::find($id);
        $client->name = $request->input('name'); //attribut name il faut que sera identique avec le nom de attribut, et input avec form
        $client->addresse = $request->input('addresse');
        $client->email = $request->input('email');
        $client->telephone = $request->input('telephone');
        //$client->user_id = auth()->user()->id;
        $client->save();

        return redirect('/clients')->with('success', 'Vous avez modifié les données de la client '.$client->name.' avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = client::find($id);
        
        //Check if client exists before deleting
        if (!isset($client)){
            return redirect('/clients')->with('error', 'Pas de client trouvé');
        }

        // Check for correct user
        //if(auth()->user()->id !==$client->user_id){
         //   return redirect('/clients')->with('error', 'Unauthorized Page');
       // }

        
        
        $client->delete();
        return redirect('/clients')->with('success', 'Vous avez supprimé la client '.$client->name.' avec succes');

       
    } 
    
    
    public function historique($id)
    {//Route
        $client = client::find($id);
        //return $client->id; dans find il n'est pas necessaire de ecrire [0]
        return view('clients/historique')->with('client', $client);

    }


    /*public function rechercher(Request $request)
    {//Route
        $c = $request->input('name'); 
        $client = DB::select('select * from clients where name = "'.$c.'"'); // tous les attributs de cet client
        return $client;
        //return view('clients/rechercher')->with('client', $client); //route + view

    }*/

  
  
    
}
