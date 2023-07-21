<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produit;
use App\Models\fournisseur;
use Illuminate\Support\Facades\DB;

class produitsController extends Controller
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
        $produits = produit::orderBy('nom','asc')->get();
        return view('produits/index')->with('produits', $produits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('produits/create');
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
            'nom' => 'required',
            'nom_scientifique' => 'required',
            'packing' => 'required',
            'date_expiration' => 'required',
            'prix' => 'required',
            'stock' => 'required',
            'armoire' => 'required',
            'date_expiration' => 'required',
            'categorie' => 'required',
            'nom_fournisseur' => 'required',
            

        ]);
        
        //return "all good!" ; 
        $produit = new produit;
        $produit->nom = $request->input('nom');
        $produit->nom_scientifique = $request->input('nom_scientifique');
        $produit->packing = $request->input('packing');
        $produit->prix = $request->input('prix');
        $produit->stock = $request->input('stock');
        $produit->armoire = $request->input('armoire');
        $produit->categorie = $request->input('categorie');
        $produit->date_expiration = $request->input('date_expiration');
        $produit->nom_fournisseur = $request->input('nom_fournisseur');
        /*$fourn = DB::select('select * from fournisseurs where name = "'.$produit->nom_fournisseur.'"');
         ($fourn = NULL){

            return redirect('/produits')->with('error', 'Fournisseur "'.$produit->nom_fournisseur.'" existe pas, plaisir a le creer dabord');
            /*$fournisseur= new fournisseur; 
            $fournisseur->name = $produit->nom_fournisseur;
            $fournisseur->name = 0;
            $fournisseur->name = 0;
            $fournisseur->save();*/
         

        //maintenant id
        
        $fourn_id = DB::select('select id from fournisseurs where name = "'.$produit->nom_fournisseur.'"'); //tjr where attribut = " " pour c.c il faut '.$ .'
        
        $produit->fournisseur_id = $fourn_id[0]->id; 
        // *tous les attributs,, select id, 
        /*if (!isset($fourn)){
            $fournisseur= new fournisseur; 
            $fournisseur->name = $produit->nom_fournisseur;
            $fournisseur->save();
            
            //adresse, telephone -> -> and then save
        }

        $fournn = DB::select('select * from fournisseurs where name = "'.$produit->nom_fournisseur.'"');*/
        //return $fourn;
        
        //$fourn = fournisseur::find("$produit->nom_fournisseur"); //il faut just id ou nombre
        /*if (!isset($fourn)){
            fournisseur= new fournisseur(); etc -> -> and then save
            
            //return redirect('/produits')->with('error', 'Pas de produit trouvé');
        }
         */
        //$produit->fournisseur_id =
        
        
        //return $fourn->addresse;
        
        //$fournisseurs = fournisseur::all();
        //return $produit->fournisseur_id = DB::select('SELECT id from fournisseurs where name = '.$produit->nom_fournisseur);;
        //foreign key qu'on a ajouté avec php make:migration add_fournisseur_id_to_produits
        //$produit->fournisseur_id = DB::select('SELECT id from fournisseurs where name is '.$produit->nom_fournisseur); // ne marche pas
        //$users = DB::select('select * from users where active = ?', [1]);
        //fournisseur::find($request->input('nom_fournisseur');)
        
        $produit->save();

        return redirect('/produits')->with('success', 'Vous avez ajouté un produit avec success');
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
        $produit = produit::find($id);
        
        //Check if produit exists before deleting
        if (!isset($produit)){
            return redirect('produits')->with('error', 'Pas de produit trouvé');
        }

        // Check for correct user
        //if(auth()->user()->id !==$produit->user_id){
        //     return redirect('/produits')->with('error', 'Unauthorized Page');
        // }

        return view('produits/edit')->with('produit', $produit);
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
            'nom' => 'required',
            'nom_scientifique' => 'required',
            'packing' => 'required',
            'date_expiration' => 'required',
            'prix' => 'required',
            'stock' => 'required',
            'armoire' => 'required',
            'date_expiration' => 'required',
            'categorie' => 'required',
            'nom_fournisseur' => 'required',

        ]);
        //
        //return "all good!" ; 
        $produit = produit::find($id); // le ligne avec cette id
        $produit->nom = $request->input('nom');
        $produit->nom_scientifique = $request->input('nom_scientifique');
        $produit->packing = $request->input('packing');
        $produit->prix = $request->input('prix');
        $produit->stock = $request->input('stock');
        $produit->armoire = $request->input('armoire');
        $produit->categorie = $request->input('categorie');
        $produit->date_expiration = $request->input('date_expiration');
        $produit->nom_fournisseur = $request->input('nom_fournisseur');
        //$produit->user_id = auth()->user()->id;
        $produit->save();

        return redirect('/produits')->with('success', 'Vous avez modifié les données de la produit avec success');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit = produit::find($id);
        
        //Check if produit exists before deleting
        if (!isset($produit)){
            return redirect('/produits')->with('error', 'Pas de produit trouvé');
        }

        // Check for correct user
        //if(auth()->user()->id !==$produit->user_id){
         //   return redirect('/produits')->with('error', 'Unauthorized Page');
       // }

        
        
        $produit->delete();
        return redirect('/produits')->with('success', 'Vous avez supprimé un produit avec succes');
    }
}
