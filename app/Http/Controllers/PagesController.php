<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\achat; // pr rapport achat + commande
use App\Models\commande;
use App\Models\produit;
use App\Models\User;
use Brick\Math\BigInteger;
//use App\Http\AuthControllers;
use Illuminate\Support\Facades\Hash; // pour insert password
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PagesController extends Controller
{

    //pour eviter guest a l'utiliser
    public function __construct()
    {
        $this->middleware('auth'); // $this->middleware('auth', ['except' => ['index', 'Dashboard']]);
    }


    //c'est une class, on utilise les methodes qu'on va creer dans routes web.php, 
    //add client manage client et il faut les ajouter dans routes ;  pages/about correct too
    public function index (){
        return view('pages/index');  
    }

    public function Dashboard (){
        return view('pages/Dashboard');  
    }


    public function RapportAchat (){ 
        
        //hebdomadaire
       // $mois=Carbon::now()->subDays(1)->toDateTimeString();
       // $now=DATE( NOW() );
       // $achats = DB::select('select * from achats where created_at >= "'.$mois.'" and created_at <= "'.$now.'" order by created_at');
       
       
       //$var= DB::select('SELECT DATE_ADD(NOW(), INTERVAL -30 DAY)');
      // return $var;
        //$var= DB::('SELECT DATE_ADD(NOW(), INTERVAL -30 DAY)');
        //where date_creation <= date(now())
        //and date_creation >= $var
       $achats = achat::orderBy('created_at','desc')->get();
        return view('pages/RapportAchat')->with('achats', $achats);
        
    }

    public function RapportCommande (){
          //SELECT DATE_ADD(NOW(), INTERVAL -30 DAY)
        //date(now())
        $commandes = commande::orderBy('created_at','desc')->get();
        return view('pages/RapportCommande')->with('commandes', $commandes);
    }


    //form = request
    public function rechercherClient(Request $request)
    {//Route
        $c = $request->input('name'); 
        $client = DB::select('select * from clients where name = "'.$c.'"'); // tous les attributs de cet client
       // return $client;
        return view('pages/rechercherClient')->with('client', $client); //route + view

    }

    //form
    public function rechercherFournisseur(Request $request)
    {//Route
        $c = $request->input('name'); 
        $fournisseurs = DB::select('select * from fournisseurs where name = "'.$c.'"'); // tous les attributs de cet client
       // return $client;
        return view('pages/rechercherFournisseur')->with('fournisseurs', $fournisseurs); //route + view

    }

    public function rechercherProduit(Request $request)
    {//Route //logique de selectionner qu'une seul champ, les champs differ, aucun inclut dans l'autre
       
        if (null !== $request->input('produit')){
            $c = $request->input('produit'); 
             $produits = DB::select('select * from produits where nom = "'.$c.'"'); // tous les attributs de cet client
       // return $client;
             return view('pages/rechercherProduit')->with('produits', $produits);
        }
         //route + view

         if (null !== $request->input('categorie')){
            $c = $request->input('categorie'); 
             $produits = DB::select('select * from produits where categorie = "'.$c.'"'); // tous les attributs de cet client
       // return $client;
             return view('pages/rechercherProduit')->with('produits', $produits);
        }

        
        if (null !== $request->input('nom_scientifique')){
            $c = $request->input('nom_scientifique'); 
             $produits = DB::select('select * from produits where nom_scientifique = "'.$c.'"'); // tous les attributs de cet client
       // return $client;
             return view('pages/rechercherProduit')->with('produits', $produits);
        }




    }

   public function rechercherCommandes(Request $request)
    {//Route
        //route + view
        $d = $request->input('date_depart');
        $f = $request->input('date_fin');  
        $commandes = DB::select('select * from commandes where created_at >= "'.$d.'" AND created_at <= "'.$f.'"'); // tous les attributs de cet client
       // return $client;
        return view('pages/rechercherCommandes')->with('commandes', $commandes);
    }

    

    public function rechercherAchats(Request $request)
    {//Route
        $d = $request->input('date_depart');
        $f = $request->input('date_fin');  
        $achats = DB::select('select * from achats where created_at >= "'.$d.'" AND created_at <= "'.$f.'"'); // tous les attributs de cet client
       // return $client;
        return view('pages/rechercherAchats')->with('achats', $achats);//route + view

    }

    public function PasDeStock()
    {//Route
        
        $produits = DB::select('select * from produits where stock = "0"'); // tous les attributs de cet client
       // return $client;
        return view('pages/PasDeStock')->with('produits', $produits); //route + view

    }

    public function expire()
    {//Route
        $date=DATE( NOW() );//finalement
        $produits = DB::select('select * from produits where date_expiration < "'.$date.'"'); // tous les attributs de cet client
       // return $client;
        return view('pages/expire')->with('produits', $produits); //route + view

    }
    

    public function Profile (){
        return view('pages/Profile');  
    }

    public function modifier($id)
    {
        
        $User = User::find($id);
        
        //Check if client exists before deleting
        if (!isset($User)){
            return redirect('Profile')->with('error', 'Pas de user trouvé');
        }

        if(auth()->user()->id !==$User->id){
            $idd = auth()->user()->id;
          return redirect('pages/'.$idd.'/modifierProfil')->with('error', 'Impossible: Vous ne pouvez modifier que votre profil ');
       }

        // Check for correct user
        //if(auth()->user()->id !==$client->user_id){
       //     return redirect('/clients')->with('error', 'Unauthorized Page');
       // }

        return view('pages/modifierProfil')->with('User', $User);
        
    }
   
    public function modifierProfil(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            //'password' => 'required',
            'email' => 'required',
            //'telephone' => 'required'

        ]);
        //
        //return "all good!" ; 
        $User = User::find($id);
        $User->name = $request->input('name'); //attribut name il faut que sera identique avec le nom de attribut, et input avec form
        $User->email = $request->input('email');
        $User->password = Hash::make($request->input('password'));
        //return $User->password;
       // $User->password = $request->input('password');
       // if($User->password = "?")
       // {
       //     $User->password = auth()->user()->password;
       //     $User->save();
       //     return redirect('/Profile')->with('success', 'Vous avez modifié le nom de "'.$User->name.'" avec success');

      //  };
       
        $User->save();

        return redirect('/Profile')->with('success', 'Vous avez modifié les données de "'.$User->name.'" avec success');
    }


  

}
