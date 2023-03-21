<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','App\Http\Controllers\FrontController@index');
Route::get('/accueilAgriculteur','App\Http\Controllers\FrontController@versAccueilAgriculteur');




//PROFIL VERS MESSAGE
Route::get('/profilVersMessage','App\Http\Controllers\FrontController@profilVersMessage');


//LOGIN
Route::get('/traitementLogin','App\Http\Controllers\FrontController@login');

Route::get('/traitementInscription','App\Http\Controllers\FrontController@inscription');
//INSCRIPTION
Route::get('/ficheVulgarisateur','App\Http\Controllers\FrontController@versFicheVulgarisateur');

//fiche vulg
Route::get('/ficheVulgarisateur/{idVul}','App\Http\Controllers\FrontController@versFicheVulgarisateur');

//traitement recherche vulg
Route::get('/traitementRecherche','App\Http\Controllers\FrontController@traitementRecherche');

//Recherche vulg
Route::get('/rechercheVulgarisateur','App\Http\Controllers\FrontController@versRechercheVulgarisateur');

Route::get('/vip', 'App\Http\Controllers\VipController@index');
Route::get('/lineChart', 'App\Http\Controllers\VipController@lineChart');
Route::get('/pieChart', 'App\Http\Controllers\VipController@pieChart');
Route::get('/ListeVulgarisateur','App\Http\Controllers\VulgarisateurController@listVulga');

//Vers login
Route::get('/loginpage','App\Http\Controllers\FrontController@versLogin');

//Vers Accueil Agr
Route::get('/retourVersAccueilAgriculteur','App\Http\Controllers\FrontController@retourVersAccueilAgriculteur');

Route::get('/toProfile','App\Http\Controllers\FrontController@toProfile');

Route::get('/test', function () {
    return view('test');
});

Route::get('/agriculteur', function () {
    return view('agriculteur.agriculteurHome');
});

Route::get('/vulgarisateur', function () 
{
    return view('vulgarisateur.vulgarisateur');
});

Route::get('/homeVulga', function () 
{
    return view( 'accueilVulgarisateur');
});

Route::post('modificationProfilV', 'App\Http\Controllers\FrontController@mofifierProfilV');
Route::post('/traitementLogin','App\Http\Controllers\VulgarisateurController@getlist');

Route::get('/deconnect', function() {
    session()->forget(['idAgriculteur', 'idVulgarisateur']);
    session()->flush();
    return view('main');
});

Route::get('/chat','App\Http\Controllers\VulgarisateurController@getchat');

//CARTE
Route::get('/carte','App\Http\Controllers\FrontController@getCarte');
Route::get('/gd','App\Http\Controllers\FrontController@getData');

Route::post('/localisation', 'App\Http\Controllers\VulgarisateurController@majPos');

Route::post('/traitementMessageV', 'App\Http\Controllers\VulgarisateurController@message');

Route::post('/traitementMessageA', 'App\Http\Controllers\FrontController@message');

//CREATION ACTIVITE ET PUBLICATION
Route::post('/creerPublication', 'App\Http\Controllers\VulgarisateurController@creerPublication');
Route::post('/creerActivite', 'App\Http\Controllers\VulgarisateurController@creerActivite');

// VIP

Route::get('/vip/accueil', function() {
    return view('VIP/index');
});

Route::get('/vip/recherche', function() {
    return view('VIP/recherche');
});

Route::post('/vip/recherche', function() {
    $profil = request('profil');
    $domaine = request('domaine');
    $nom = request('nom');
    $req = null;
    if ($profil == "Vulgarisateur") {
        if ($domaine == "" && $nom == "") {
            $req = "select * from vulgarisateurs";
        } elseif ($domaine != "" && $nom == "") {
            $req = sprintf("select * from vulgarisateurs v join domaines d on d.idDomaine = v.idDomaine where d.nomDomaine = '%s'", $domaine);
        } elseif ($domaine == "" && $nom != "") {
            $req = "select v.nom, v.prenom, v.contact, v.pdp, v.login, concat(v.nom, ' ', v.prenom) c1, concat(v.prenom, ' ', v.nom) c2 from vulgarisateurs v where v.nom like '%".$nom."%' or v.prenom like '%".$nom."%'";
        } else {
            $req = "select * from vulgarisateurs v join domaines d on d.idDomaine = v.idDomaine where (v.nom like '%".$nom."%' or v.prenom like '%".$nom."%') and d.nomDomaine = '".$domaine."'";
        }
    } else {
        if ($nom == "") {
            $req = "select * from agriculteurs";
        } else {
            $req = "select * from agriculteurs where nom like '%".$nom."%' or prenom like '%".$nom."%'";
        }
    }
    $res = DB::select($req);
    return view('VIP/recherche', ["data" => $res]);
});

Route::get('/vip/domaines', function() {
    return view('VIP/listeDomaines');
});

Route::get('/vip/equipe', function() {
    return view('VIP/equipe');
});

Route::get('/vip/profile', function() {
    return view('VIP/profile');
});

Route::post('/localisation', 'App\Http\Controllers\VulgarisateurController@majPos');
