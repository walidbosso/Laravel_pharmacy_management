<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fournisseur;
//use Illuminate\Support\Facades\DB;

class fournisseursController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs = fournisseur::orderBy('name','asc')->get();
        return view('fournisseurs/index')->with('fournisseurs', $fournisseurs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('fournisseurs/create');
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
            'addresse' => 'required',
            'email' => 'required',
            'telephone' => 'max:13'

        ]);
        //return "all good!" ; 
        $fournisseur = new fournisseur;
        $fournisseur->name = $request->input('name');
        $fournisseur->addresse = $request->input('addresse');
        $fournisseur->email = $request->input('email');
        $fournisseur->telephone = $request->input('telephone');
        //$fournisseur->user_id = auth()->user()->id;
        $fournisseur->save();

        return redirect('/fournisseurs')->with('success', 'Vous avez ajouté la fournisseur '.$fournisseur->name.' avec success');
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
        
        $fournisseur = fournisseur::find($id);
        
        //Check if fournisseur exists before deleting
        if (!isset($fournisseur)){
            return redirect('fournisseurs')->with('error', 'Pas de fournisseur trouvé');
        }

        // Check for correct user
        //if(auth()->user()->id !==$fournisseur->user_id){
       //     return redirect('/fournisseurs')->with('error', 'Unauthorized Page');
       // }

        return view('fournisseurs/edit')->with('fournisseur', $fournisseur);
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
            'addresse' => 'required',
            'email' => 'required',
            'telephone' => 'max:13'

        ]);
        //
        //return "all good!" ; 
        $fournisseur = fournisseur::find($id);
        $fournisseur->name = $request->input('name'); //attribut name il faut que sera identique avec le nom de attribut, et input avec form
        $fournisseur->addresse = $request->input('addresse');
        $fournisseur->email = $request->input('email');
        $fournisseur->telephone = $request->input('telephone');
        //$fournisseur->user_id = auth()->user()->id;
        $fournisseur->save();

        return redirect('/fournisseurs')->with('success', 'Vous avez modifié les données de la fournisseur '.$fournisseur->name.' avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fournisseur = fournisseur::find($id);
        
        //Check if fournisseur exists before deleting
        if (!isset($fournisseur)){
            return redirect('/fournisseurs')->with('error', 'Pas de fournisseur trouvé');
        }

        // Check for correct user
        //if(auth()->user()->id !==$fournisseur->user_id){
         //   return redirect('/fournisseurs')->with('error', 'Unauthorized Page');
       // }

        
        
        $fournisseur->delete();
        return redirect('/fournisseurs')->with('success', 'Vous avez supprimé la fournisseur '.$fournisseur->name.' de la base de données');
    }


    public function produits($id)
    {//Route
        $fournisseur = fournisseur::find($id);
        //return $client->id; dans find il n'est pas necessaire de ecrire [0]
        return view('fournisseurs/produits')->with('fournisseur', $fournisseur);

    }
}
