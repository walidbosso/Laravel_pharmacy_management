<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\achat;
use Illuminate\Support\Facades\DB;

class achatsController extends Controller
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
        $achats = achat::orderBy('created_at','desc')->get();
        return view('achats/index')->with('achats', $achats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('achats/create');
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
            'nom_fournisseur' => 'required',
            'nom_produit' => 'required',
            'nombre_produits' => 'required',
            

        ]);
        //return "all good!" ; 
        $achat = new achat;
        $achat->nom_fournisseur = $request->input('nom_fournisseur');
        $achat->nom_produit = $request->input('nom_produit');
        $achat->nombre_produits = $request->input('nombre_produits');
        
        //les ids
        //user_id
        $achat->user_id = auth()->user()->id;
        //fournisseur_id

        $clid = DB::select('select id from fournisseurs where name = "'.$achat->nom_fournisseur.'"'); //tjr where attribut = " " pour c.c il faut '.$ .'
        $achat->fournisseur_id = $clid[0]->id;
        //produit_id
        $prid = DB::select('select id from produits where nom = "'.$achat->nom_produit.'"'); //tjr where attribut = " " pour c.c il faut '.$ .'
        $achat->produit_id = $prid[0]->id;

        //prix_total
        $pr= DB::select('select prix from produits where id = "'.$achat->produit_id.'"');

        //return $pr[0]->prix; if count($pr > 0) foreach $pr as $p, $p->id,,,, donc ici on surf array 0 1 2 3 et on prent id, ici c'est un donne donc c'est [0]->id
        $quantite = $request->input('nombre_produits');
        $achat->prix_total = ($pr[0]->prix*$quantite);

        
        //essayer de creer nv produit/fournisseur si non exist
        //essayer de reduire quantite dans tableproduits
        
        $achat->save();

        return redirect('/achats')->with('success', 'Une achat avec '.$achat->nom_fournisseur.' a été ajouté avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $achat = achat::find($id);
        return view('achats.show')->with('achat', $achat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $achat = achat::find($id);
        
        //Check if produit exists before deleting
        if (!isset($achat)){
            return redirect('achats')->with('error', 'Pas de achat trouvé');
        }

        // Check for correct user
        //if(auth()->user()->id !==$produit->user_id){
        //     return redirect('/produits')->with('error', 'Unauthorized Page');
        // }

        return view('achats/edit')->with('achat', $achat);
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
            'nom_fournisseur' => 'required',
            'nom_produit' => 'required',
            'nombre_produits' => 'required',
            

        ]);
        //return "all good!" ; 
        $achat = achat::find($id);
        $achat->nom_fournisseur = $request->input('nom_fournisseur');
        $achat->nom_produit = $request->input('nom_produit');
        $achat->nombre_produits = $request->input('nombre_produits');
        
        //les ids
        //user_id
        

        $achat->user_id = auth()->user()->id;
        //fournisseur_id
        $clid = DB::select('select id from fournisseurs where name = "'.$achat->nom_fournisseur.'"'); //tjr where attribut = " " pour c.c il faut '.$ .'
        $achat->fournisseur_id = $clid[0]->id;
        //produit_id
        $prid = DB::select('select id from produits where nom = "'.$achat->nom_produit.'"'); //tjr where attribut = " " pour c.c il faut '.$ .'
        $achat->produit_id = $prid[0]->id;

        //prix_total
        $pr= DB::select('select prix from produits where id = "'.$achat->produit_id.'"');

        //return $pr[0]->prix; if count($pr > 0) foreach $pr as $p, $p->id,,,, donc ici on surf array 0 1 2 3 et on prent id, ici c'est un donne donc c'est [0]->id
        $quantite = $request->input('nombre_produits');
        $achat->prix_total = ($pr[0]->prix*$quantite);

        
        //essayer de creer nv produit/fournisseur si non exist
        //essayer de reduire quantite dans tableproduits
        
        $achat->save();

        return redirect('/achats')->with('success', 'Une achat vers '.$achat->nom_fournisseur.' a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $achat = achat::find($id);
        
        //Check if produit exists before deleting
        if (!isset($achat)){
            return redirect('/achats')->with('error', 'Pas de achat trouvé');
        }

        // Check for correct user
        if(auth()->user()->id !==$achat->user_id){
            return redirect('/achats')->with('error', 'Impossible: Vous devez être utilsateur: - '.$achat->user->name.' - pour être capable a supprimer cette achat');
        }

        
        
        $achat->delete();
        return redirect('/achats')->with('success', 'Vous avez supprimé une achat avec succes');
    }
}
