<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commande;
use Illuminate\Support\Facades\DB;

class commandesController extends Controller
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
        $commandes = commande::orderBy('created_at','desc')->get();
        return view('commandes/index')->with('commandes', $commandes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('commandes/create');
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
            'nom_client' => 'required',
            'nom_produit' => 'required',
            'nombre_produits' => 'required',
            

        ]);
        //return "all good!" ; 
        $commande = new commande;
        $commande->nom_client = $request->input('nom_client');
        $commande->nom_produit = $request->input('nom_produit');
        $commande->nombre_produits = $request->input('nombre_produits');
        
        //les ids
        //user_id
        $commande->user_id = auth()->user()->id;
        //client_id

        $clid = DB::select('select id from clients where name = "'.$commande->nom_client.'"'); //tjr where attribut = " " pour c.c il faut '.$ .'
        $commande->client_id = $clid[0]->id;
        //produit_id
        $prid = DB::select('select id from produits where nom = "'.$commande->nom_produit.'"'); //tjr where attribut = " " pour c.c il faut '.$ .'
        $commande->produit_id = $prid[0]->id;

        //prix_total
        $pr= DB::select('select prix from produits where id = "'.$commande->produit_id.'"');

        //return $pr[0]->prix; if count($pr > 0) foreach $pr as $p, $p->id,,,, donc ici on surf array 0 1 2 3 et on prent id, ici c'est un donne donc c'est [0]->id
        $quantite = $request->input('nombre_produits');
        $commande->prix_total = ($pr[0]->prix*$quantite);

        
        //essayer de creer nv produit/client si non exist
        //essayer de reduire quantite dans tableproduits
        
        $commande->save();

        return redirect('/commandes')->with('success', 'Un commade a été effectué avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commande = commande::find($id);
        return view('commandes.show')->with('commande', $commande);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commande = commande::find($id);
        
        //Check if produit exists before deleting
        if (!isset($commande)){
            return redirect('commandes')->with('error', 'Pas de commande trouvé');
        }

        // Check for correct user
        //if(auth()->user()->id !==$produit->user_id){
        //     return redirect('/produits')->with('error', 'Unauthorized Page');
        // }

        return view('commandes/edit')->with('commande', $commande);
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
            'nom_client' => 'required',
            'nom_produit' => 'required',
            'nombre_produits' => 'required',
            

        ]);
        //return "all good!" ; 
        $commande = commande::find($id);
        $commande->nom_client = $request->input('nom_client');
        $commande->nom_produit = $request->input('nom_produit');
        $commande->nombre_produits = $request->input('nombre_produits');
        
        //les ids
        //user_id
        

        $commande->user_id = auth()->user()->id;
        //client_id
        $clid = DB::select('select id from clients where name = "'.$commande->nom_client.'"'); //tjr where attribut = " " pour c.c il faut '.$ .'
        $commande->client_id = $clid[0]->id;
        //produit_id
        $prid = DB::select('select id from produits where nom = "'.$commande->nom_produit.'"'); //tjr where attribut = " " pour c.c il faut '.$ .'
        $commande->produit_id = $prid[0]->id;

        //prix_total
        $pr= DB::select('select prix from produits where id = "'.$commande->produit_id.'"');

        //return $pr[0]->prix; if count($pr > 0) foreach $pr as $p, $p->id,,,, donc ici on surf array 0 1 2 3 et on prent id, ici c'est un donne donc c'est [0]->id
        $quantite = $request->input('nombre_produits');
        $commande->prix_total = ($pr[0]->prix*$quantite);

        
        //essayer de creer nv produit/client si non exist
        //essayer de reduire quantite dans tableproduits
        
        $commande->save();

        return redirect('/commandes')->with('success', 'Un commande a été modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commande = commande::find($id);
        
        //Check if produit exists before deleting
        if (!isset($commande)){
            return redirect('/commandes')->with('error', 'Pas de commande trouvé');
        }

        // Check for correct user
        if(auth()->user()->id !==$commande->user_id){
            return redirect('/commandes')->with('error', 'Impossible: Vous devez être utilsateur: - '.$commande->user->name.' - pour être capable a supprimer cette commande');
        }

        
        
        $commande->delete();
        return redirect('/commandes')->with('success', 'Vous avez supprimé un commande avec succes');
    }
}
