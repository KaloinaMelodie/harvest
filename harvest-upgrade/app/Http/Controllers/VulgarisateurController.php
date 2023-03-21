<?php

namespace App\Http\Controllers;

use App\Models\Vulgarisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Storage;

class VulgarisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vulgarisateurs = Vulgarisateur::orderBy("nom", "asc")->paginate(5);

        return view('listeVulgarisateur', compact('vulgarisateurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Vulgarisateur  $vulgarisateur
     * @return \Illuminate\Http\Response
     */
    public function show(Vulgarisateur $vulgarisateur)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vulgarisateur  $vulgarisateur
     * @return \Illuminate\Http\Response
     */
    public function edit(Vulgarisateur $vulgarisateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vulgarisateur  $vulgarisateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vulgarisateur $vulgarisateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vulgarisateur  $vulgarisateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vulgarisateur $vulgarisateur)
    {
        //
    }

    public function listVulga()
    {
        $vulga=Vulgarisateur::all();
        return view('VIP\listeVulgarisateur',['vulga' => $vulga]);
    }

    public function charger($id) 
    {
        echo $id."gvuvjhbjh b";
    }

    // public function getlist (Request $request)
    // {
    //     $req = sprintf("SELECT * FROM Vulgarisateurs JOIN Chats on Chats.idVulgarisateur = Vulgarisateur.idVulgarisateur where idVulgarisateur = '%s' ", $request->session()->get('idVulgarisateur'));
    //     $resultat = DB::Select($req);
    //     echo $req;
    //     // return view('resources\views\accueilVulgarisateur',['resultat' => $resultat] );
    // }

    public function getChat(Request $request)
    {
        $req = sprintf("SELECT * FROM  chats  where idVulgarisateur = '%s' and idAgriculteur = '%s' ", $request->session()->get('idVulgarisateur'),$request);
        $resultat = DB::Select($req);
        return view('accueilVulgarisateur',['result' => $resultat] );
    }

    public function majPos(Request $request)
    {
        $longitude = $request->input('longitude');
        $latitude = $request->input('latitude');
        $idVulgarisateur = session("idVulgarisateur");
        $date = date('Y-m-d');
        $reqInsert = "insert into localisation_vulgarisateurs values (null, ".$idVulgarisateur.",  ".$longitude.", ".$latitude.", '".$date."')";
        

        $listeActivite = DB::Select("select vulgarisateurs.nom,titre,activite,date from activites join vulgarisateurs on vulgarisateurs.idVulgarisateur = activites.idVulgarisateur");
        $listePublication = DB::Select("select vulgarisateurs.nom,date,photo,texte from publications join vulgarisateurs on vulgarisateurs.idVulgarisateur = publications.idVulgarisateur");

        $req= sprintf("select * from vulgarisateurs where idVulgarisateur = %d", $idVulgarisateur);
        $resultat = DB::select($req);
        
        $req1 = sprintf("SELECT distinct(a.idAgriculteur), v.idVulgarisateur, a.pdp pdpA, a.nom nomA, a.prenom prenomA FROM agriculteurs a JOIN chats c on c.idAgriculteur = a.idAgriculteur join  vulgarisateurs v on v.idVulgarisateur=c.idVulgarisateur where v.idVulgarisateur = %d ", $resultat[0]->idVulgarisateur);
        $resultat1 = DB::Select($req1);
        
        $req2 = sprintf("SELECT c.idVulgarisateur, c.idAgriculteur, c.texte, c.sender FROM agriculteurs a JOIN chats c on c.idAgriculteur = a.idAgriculteur join  vulgarisateurs v on v.idVulgarisateur=c.idVulgarisateur where v.idVulgarisateur = %d ", $resultat[0]->idVulgarisateur);
        $resultat2 = DB::Select($req2);

        if (DB::insert($reqInsert)) {
            return view('accueilVulgarisateur', ['monProfil' => $resultat, 'listeAgriculteur' => $resultat1, 'listeMessage' => $resultat2, "listeActivite" => $listeActivite, 'listePublication' => $listePublication, 'successLocalisation' => true]);
        } 
        else  {
            return view('accueilVulgarisateur', ['monProfil' => $resultat, 'listeAgriculteur' => $resultat1, 'listeMessage' => $resultat2, "listeActivite" => $listeActivite, 'listePublication' => $listePublication, 'successLocalisation' => true]);
        }
    }

    public function message(Request $req) 
    {
        $idAgriculteur = $req->input('idAgriculteur');
        $idVulgarisateur = $req->input('idVulgarisateur');
        $sender = $req->input('sender');
        $texte = $req->input('texte');
        $requete = sprintf("insert into chats values (null, %d, %d, '%s', '%s')", $idVulgarisateur, $idAgriculteur, $texte, $sender);
        if(DB::insert($requete)) 
        {
            $req= sprintf("select * from vulgarisateurs where idVulgarisateur = %d", $idVulgarisateur);
            $resultat = DB::select($req);
            
            $req1 = sprintf("SELECT distinct(a.idAgriculteur), v.idVulgarisateur, a.pdp pdpA, a.nom nomA, a.prenom prenomA FROM agriculteurs a JOIN chats c on c.idAgriculteur = a.idAgriculteur join  vulgarisateurs v on v.idVulgarisateur=c.idVulgarisateur where v.idVulgarisateur = %d ", $resultat[0]->idVulgarisateur);
            $resultat1 = DB::Select($req1);

            $req2 = sprintf("SELECT c.idVulgarisateur, c.idAgriculteur, c.texte, c.sender FROM agriculteurs a JOIN chats c on c.idAgriculteur = a.idAgriculteur join  vulgarisateurs v on v.idVulgarisateur=c.idVulgarisateur where v.idVulgarisateur = %d ", $resultat[0]->idVulgarisateur);
            $resultat2 = DB::Select($req2);

            $req3 = sprintf(" SELECT nom,date,texte,photo,pdp,prenom  FROM Publications Join Vulgarisateurs on Vulgarisateurs.idVulgarisateur = Publications.idVulgarisateur ");
            $resultat3 = DB::Select($req3);

            $req4 = sprintf(" select * from activites join vulgarisateurs on vulgarisateurs.idVulgarisateur = activites.idVulgarisateur ");
            $resultat4 = DB::Select($req4);

            return view('accueilVulgarisateur', ['monProfil' => $resultat, 'listeAgriculteur' => $resultat1, 'listeMessage' => $resultat2 , 'listePublication' => $resultat3 ,'listeActivite' => $resultat4  ]);
        } 
        else 
        {
            echo "Une erreur s'est produite !";
        }
    }

    public function creerPublication(Request $request) 
    {
        $texte = $request->input('texte');
        $name = Storage::disk('public')->put('pub',$request->file);
        $requete = sprintf("insert into publications values (null, %d,CURDATE(),'%s','%s')",$request->session()->get('idVulgarisateur'),Storage::url($name),$texte);
        if(DB::insert($requete))
        {
            $req = sprintf(" SELECT * from vulgarisateurs where idVulgarisateur = %d", $request->session()->get('idVulgarisateur'));
            $resultat = DB::select($req);

            $req1 = sprintf(" SELECT distinct(a.idAgriculteur), v.idVulgarisateur, a.pdp pdpA, a.nom nomA, a.prenom prenomA FROM agriculteurs a JOIN chats c on c.idAgriculteur = a.idAgriculteur join  vulgarisateurs v on v.idVulgarisateur=c.idVulgarisateur where v.idVulgarisateur = %d ", $request->session()->get('idVulgarisateur'));
            $resultat1 = DB::Select($req1);

            $req2 = sprintf(" SELECT c.idVulgarisateur, c.idAgriculteur, c.texte, c.sender FROM agriculteurs a JOIN chats c on c.idAgriculteur = a.idAgriculteur join  vulgarisateurs v on v.idVulgarisateur=c.idVulgarisateur where v.idVulgarisateur = %d ", $request->session()->get('idVulgarisateur'));
            $resultat2 = DB::Select($req2);

            $req3 = sprintf(" SELECT nom,date,texte,photo,pdp,prenom  FROM Publications Join Vulgarisateurs on Vulgarisateurs.idVulgarisateur = Publications.idVulgarisateur ");
            $resultat3 = DB::Select($req3);

            $req4 = sprintf(" select * from activites join vulgarisateurs on vulgarisateurs.idVulgarisateur = activites.idVulgarisateur ");
            $resultat4 = DB::Select($req4);
           
            return view('accueilVulgarisateur', ['monProfil' => $resultat, 'listeAgriculteur' => $resultat1, 'listeMessage' => $resultat2 , 'listePublication' => $resultat3 ,'listeActivite' => $resultat4  ]);
        } 
        else 
        {
            echo "Une erreur s'est produite !";
        }
    }

    
    public function creerActivite(Request $request) 
    {

        $activite = $request->input('activite');
        $titre = $request->input('titre');
        $requete = sprintf("insert into activites values (null, %d,'%s','%s',CURDATE())",$request->session()->get('idVulgarisateur'),$titre,$activite);
        if(DB::insert($requete))
        {
            $req = sprintf(" SELECT * from vulgarisateurs where idVulgarisateur = %d", $request->session()->get('idVulgarisateur'));
            $resultat = DB::select($req);
            
            $req1 = sprintf(" SELECT distinct(a.idAgriculteur), v.idVulgarisateur, a.pdp pdpA, a.nom nomA, a.prenom prenomA FROM agriculteurs a JOIN chats c on c.idAgriculteur = a.idAgriculteur join  vulgarisateurs v on v.idVulgarisateur=c.idVulgarisateur where v.idVulgarisateur = %d ", $request->session()->get('idVulgarisateur'));
            $resultat1 = DB::Select($req1);

            $req2 = sprintf(" SELECT c.idVulgarisateur, c.idAgriculteur, c.texte, c.sender FROM agriculteurs a JOIN chats c on c.idAgriculteur = a.idAgriculteur join  vulgarisateurs v on v.idVulgarisateur=c.idVulgarisateur where v.idVulgarisateur = %d ", $request->session()->get('idVulgarisateur'));
            $resultat2 = DB::Select($req2);

            $req3 = sprintf(" SELECT nom,date,texte,photo,pdp,prenom  FROM Publications Join Vulgarisateurs on Vulgarisateurs.idVulgarisateur = Publications.idVulgarisateur ");
            $resultat3 = DB::Select($req3);

            $req4 = sprintf(" select idActivite,activites.idVulgarisateur,titre,activite,date,vulgarisateurs.nom as nom from activites join vulgarisateurs on vulgarisateurs.idVulgarisateur = activites.idVulgarisateur ");
            $resultat4 = DB::Select($req4);

            return view('accueilVulgarisateur', ['monProfil' => $resultat, 'listeAgriculteur' => $resultat1, 'listeMessage' => $resultat2 , 'listePublication' => $resultat3 ,'listeActivite' => $resultat4  ]);
        } 
        else 
        {
            echo "Une erreur s'est produite !";
        }
    }

}
