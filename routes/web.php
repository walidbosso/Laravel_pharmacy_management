<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//ces liens sera traiter par ces methodes, then this methode traite les donnes et return view voulu




Route::get('/', [\App\Http\Controllers\PagesController::class, 'index']); 
Route::get('/Dashboard', [\App\Http\Controllers\PagesController::class, 'Dashboard']); //pour test
//Route::get('/login', [\App\Http\Controllers\PagesController::class, 'login']); 
//Route::get('/logout', [\App\Http\Controllers\PagesController::class, 'logout']); 
//Route::get('/register', [\App\Http\Controllers\PagesController::class, 'register']); 

//get put post utilise route list pour savoir

//pour les bd, pour controllers index create destroy edit update and show, facile comme ça crud
Route::resource('clients', \App\Http\Controllers\clientsController::class);
Route::resource('fournisseurs', \App\Http\Controllers\fournisseursController::class);
Route::resource('produits', \App\Http\Controllers\produitsController::class);
Route::resource('commandes', \App\Http\Controllers\commandesController::class);
Route::resource('achats', \App\Http\Controllers\achatsController::class);

//gestion utilisat
Route::resource('users', \App\Http\Controllers\usersController::class);
Route::put('users/{user}', [\App\Http\Controllers\usersController::class, 'admin']);
Route::get('users/{user}/historiqueAchats', [\App\Http\Controllers\usersController::class, 'historiqueAchats']);
Route::get('users/{user}/historiqueCommandes', [\App\Http\Controllers\usersController::class, 'historiqueCommandes']);
//Route::post('users', [\App\Http\Controllers\usersController::class, 'rechCommandes']); // c'est comme store tjjjjjrrrr regarde php artisan rpute:list, qlq soit la function il fautr route



//Pages
Route::get('/Profile', [\App\Http\Controllers\PagesController::class, 'Profile']); 

Route::get('/RapportAchat', [\App\Http\Controllers\PagesController::class, 'RapportAchat']); 
Route::get('/RapportCommande', [\App\Http\Controllers\PagesController::class, 'RapportCommande']); 

//rechercher
Route::get('/rechercherClient', [\App\Http\Controllers\PagesController::class, 'rechercherClient']); //page view il faut route
Route::get('/rechercherFournisseur', [\App\Http\Controllers\PagesController::class, 'rechercherFournisseur']); //page view il faut route
Route::get('/rechercherProduit', [\App\Http\Controllers\PagesController::class, 'rechercherProduit']); //page view il faut route
Route::put('/rechercherCommandes', [\App\Http\Controllers\PagesController::class, 'rechercherCommandes']);
Route::get('/rechercherAchats', [\App\Http\Controllers\PagesController::class, 'rechercherAchats']);

//utilise id (envoyer dans link) find(id)
Route::get('clients/{client}/historique', [\App\Http\Controllers\clientsController::class, 'historique']);//comme edit car on veut id
Route::get('fournisseurs/{fournisseur}/produits', [\App\Http\Controllers\fournisseursController::class, 'produits']);//comme edit car on veut id

//id, et 2eme pour update id + request (request, id) find id + request input
Route::get('pages/{User}/modifierProfil', [\App\Http\Controllers\PagesController::class, 'modifier']);//comme edit on veut id de auth
Route::put('Profile/{User}', [\App\Http\Controllers\PagesController::class, 'modifierProfil']); //c'est comme update, regarder route:list, put et /user c'est id, error de 2arguments solve par ça

//produits
Route::get('/PasDeStock', [\App\Http\Controllers\PagesController::class, 'PasDeStock']); //page view il faut route
Route::get('/expire', [\App\Http\Controllers\PagesController::class, 'expire']); //page view il faut route


//Route::get('clients/rechercher', [\App\Http\Controllers\clientsController::class, 'rechercher']);
//Route::get('/historique', [\App\Http\Controllers\PagesController::class, 'historique']); 









/*
Route::get('/', function () {
    return view('welcome');
});

Route::resource('achats','achatsController');

Route::get('/index', 'PagesController@index');

Route::get('/', 'PagesController@index');
*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
