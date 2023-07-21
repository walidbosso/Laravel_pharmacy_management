<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\DB;

class usersController extends Controller
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
    if(auth()->user()->role !== "admin"){
        return redirect('Profile')->with('error', 'Vous avez pas le droit à utiliser cet lien');
    }
        $users = user::orderBy('name','asc')->get();
        return view('users/index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $user = user::find($id);
        
        //Check if user exists before deleting
        if (!isset($user)){
            return redirect('/users')->with('error', 'Pas de user trouvé');
        }

        // Check for correct user
        if(auth()->user()->role !== "admin"){
            return redirect('pages/Profile')->with('error', 'Vous êtes pas autorisé');
        }

        
        
        $user->delete();
        return redirect('/users')->with('success', 'Vous avez supprimé utilisateur '.$user->name.' avec succes');

    }

    public function admin($id)
    {
        
        $user = user::find($id);
        
        
        if (!isset($user)){
            return redirect('/users')->with('error', 'Pas de utilisateur trouvé');
        }

        // Check for correct user
        if(auth()->user()->role !== "admin"){
            return redirect('pages/Profile')->with('error', 'Vous êtes pas autorisé');
        }

        
        
        $user->role="admin";
        $user->save();
        return redirect('/users')->with('success', 'Utilisateur '.$user->name.' est maintenant admin!');

    }

    public function historiqueAchats($id)
    {//Route
        $user = user::find($id);
        //return $user->id; dans find il n'est pas necessaire de ecrire [0]
        return view('users/historiqueAchats')->with('user', $user);

    }

     
   
    public function historiqueCommandes($id)
    {//Route
        $user = user::find($id);
        //return $user->id; dans find il n'est pas necessaire de ecrire [0]
        return view('users/historiqueCommandes')->with('user', $user);

    }


    /*public function rechCommandes(Request $request)
    {
    //Route
        $user = $request->input('user');   
        return $user;
        //$user_id = DB::select('select id from users where name = "'.$user.'" ');    //return $user->id; dans find il n'est pas necessaire de ecrire [0]
       // return redirect('users/'.$user_id.'/historiqueCommandes');

    }*/


   


    
}
