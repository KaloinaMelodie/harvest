<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\DB;
use App\Models\Vulgarisateurs;
use App\Models\Publications;



class FrontController extends Controller
{
    //RECUPERATION DATA
    public function loadContent(Request $request){
       $listeActivite = DB::Select("select vulgarisateurs.nom,titre,activite,date from activites join vulgarisateurs on vulgarisateurs.idVulgarisateur = activites.idVulgarisateur");
       $listePublication = DB::Select("select vulgarisateurs.nom,date,photo,texte from publications join vulgarisateurs on vulgarisateurs.idVulgarisateur = publications.idVulgarisateur");
        $listeDomaine =  DB::Select("select * from domaines");
        $listeActivite =  DB::Select("select * from activites");
           //PROFIL
        $reqProfil = sprintf("select idAgriculteur as id,nom,prenom,pdp,adresse,ddn,login,contact from agriculteurs  where idAgriculteur=%d",$request->session()->get('idAgriculteur'));
        $profil = DB::Select($reqProfil);

        //INSERTION DATA DANS TAB
        $tab['listeActivite'] = $listeActivite;
        $tab['listePublication'] = $listePublication;
        $tab['listeDomaine'] = $listeDomaine;
        $tab['profil'] = $profil;
        return $tab;

    }
    
    public function profilVersMessage(Request $request){
        $idVulgarisateur = $request->input('idVulgarisateur');
        $idAgriculteur = $request->session()->get('idAgriculteur');
      /*$req= sprintf("insert into chats values (null,%d,%d,'Bienvenue à vous deux','a'",$idVulgarisateur,$idAgriculteur);      

    */
     $req1 = sprintf("SELECT distinct(a.idAgriculteur), v.idVulgarisateur, v.pdp pdpV, v.nom nomV, v.prenom prenomV FROM agriculteurs a JOIN chats c on c.idAgriculteur = a.idAgriculteur join  vulgarisateurs v on v.idVulgarisateur=c.idVulgarisateur where a.idAgriculteur = %d ", $idAgriculteur);

                $resultat1 = DB::Select($req1);

                $req2 = sprintf("SELECT c.idVulgarisateur, c.idAgriculteur, c.texte, c.sender FROM agriculteurs a JOIN chats c on c.idAgriculteur = a.idAgriculteur join  vulgarisateurs v on v.idVulgarisateur=c.idVulgarisateur where a.idAgriculteur = %d ", $idAgriculteur);

                $resultat2 = DB::Select($req2);

       $resultat = DB::table("chats")->insert(
            [
                'idVulgarisateur' => $idVulgarisateur,
                'idAgriculteur' => $idAgriculteur,
                'texte' => "Bienvenue à vous deux",
                'sender' => 'a'
            ]
       );
       /*echo "success";*/
       //var_dump($resultat);
       $data = $this->loadContent($request);
       return view('accueilAgriculteur',['idVulgarisateur' =>  $idVulgarisateur,'listeVulgarisateur' => $resultat1, 'listeMessage' => $resultat2, 'listePublication' =>  $data['listePublication'] , 'listeActivite' =>  $data['listeActivite'] , 'listeDomaine' =>  $data['listeDomaine'] , 'profil' => $data['profil']]);    
    }

    public function toProfile(){
        $reqVulg = sprintf("select * from Vulgarisateurs v where v.idVulgarisateur=%d",request('idVulg'));     
        $reqCoord = sprintf("select  lv.longitude as longitude,lv.latitude as latitude from localisation_vulgarisateurs lv join Vulgarisateurs v on lv.idVulgarisateur = v.idVulgarisateur where v.idVulgarisateur=%d",request('idVulg'));     
    
        $resVulg = DB::Select($reqVulg);
        $resCoord = DB::Select($reqCoord);

       
        return view('fiche',['vulg' =>  $resVulg, 'coord' => $resCoord]);
    }
    //
    public function index(){
    
        return view('main');
    }

    //VERS LOGIN
    public function versLogin(){
        return view('home');
    }
    public function getNomVulgarisateurFromId($id){
        $res = DB::table('vulgarisateurs')
           ->where('idVulgarisateur',$id)
           ->get();
           $s="sd";
           foreach($res as $r){

               $s = $r->nom;
           }
       //echo $resultat;
       return $s;
   }

    public function retourVersAccueilAgriculteur(Request $request){
    
         
            $listeActivite = DB::Select("select idActivite,activites.idVulgarisateur,titre,activite,date,vulgarisateurs.nom as nom from activites join vulgarisateurs on vulgarisateurs.idVulgarisateur = activites.idVulgarisateur  ");
            $listePublication = DB::Select("select vulgarisateurs.nom,date,photo,texte from publications join vulgarisateurs on vulgarisateurs.idVulgarisateur = publications.idVulgarisateur");
             
            $listeDomaine =  DB::Select("select * from domaines");
             $listeActivite =  DB::Select("select * from activites");
              //PROFIL
           $reqProfil = sprintf("select idAgriculteur as id,nom,prenom,pdp,adresse,ddn,login,contact from agriculteurs  where idAgriculteur=%d",$request->session()->get('idAgriculteur'));
            $profil = DB::Select($reqProfil);

        return view('accueilAgriculteur',[ 'listeActivite' => $listeActivite , 'listePublication' => $listePublication , 'listeDomaine' => $listeDomaine , 'profil' => $profil]);
    }

   public function login(){
    //    echo 'a';
    /*---RECUPERATION DE TOUS LES DONNEES-----*/
   
      $listeActivite = DB::Select("select vulgarisateurs.nom,titre,activite,date from activites join vulgarisateurs on vulgarisateurs.idVulgarisateur = activites.idVulgarisateur");
    $listePublication = DB::Select("select vulgarisateurs.nom,date,photo,texte from publications join vulgarisateurs on vulgarisateurs.idVulgarisateur = publications.idVulgarisateur");
     
    $listeDomaine =  DB::Select("select * from domaines");
       if(request('profile') == 'Agriculteurs'){
          
           $req= sprintf("select * from agriculteurs where login = '%s' and mdp='%s'",request('login'),request('mdp'));
           //echo $req;
           $resultat = DB::select($req);
           $publications = Publications::all();
           $auteur=array();

           //PROFIL
           $reqProfil = sprintf("select idAgriculteur as id,nom,prenom,pdp,adresse,ddn,login,contact from agriculteurs  where idAgriculteur=%d",$resultat[0]->idAgriculteur);
            $profil = DB::Select($reqProfil);

           foreach($publications as $pub) {
               $auteur = $this->getNomVulgarisateurFromId($pub->idVulgarisateur);
           }
           if(count($resultat)!=0){
                $req1 = sprintf("SELECT distinct(a.idAgriculteur), v.idVulgarisateur, v.pdp pdpV, v.nom nomV, v.prenom prenomV FROM agriculteurs a JOIN chats c on c.idAgriculteur = a.idAgriculteur join  vulgarisateurs v on v.idVulgarisateur=c.idVulgarisateur where a.idAgriculteur = %d ", $resultat[0]->idAgriculteur);
                $resultat1 = DB::Select($req1);

                $req2 = sprintf("SELECT c.idVulgarisateur, c.idAgriculteur, c.texte, c.sender FROM agriculteurs a JOIN chats c on c.idAgriculteur = a.idAgriculteur join  vulgarisateurs v on v.idVulgarisateur=c.idVulgarisateur where a.idAgriculteur = %d ", $resultat[0]->idAgriculteur);
                $resultat2 = DB::Select($req2);

                session(['idAgriculteur' => $resultat[0]->idAgriculteur]);
                return view('accueilAgriculteur',['publication'=> $publications ,'auteur' => $auteur, 'listeVulgarisateur' => $resultat1, 'listeMessage' => $resultat2, "listeActivite" => $listeActivite, 'listePublication' => $listePublication , 'profil' => $profil , 'listeDomaine' => $listeDomaine])->with('idAgriculteur',$resultat[0]->idAgriculteur);
           }else{
               return view('home',['message' => "Veuillez verifier votre login et votre mot de passe"]);
           }
       }
        if(request('profile') == 'Vulgarisateurs'){
          
           $req= sprintf("select * from vulgarisateurs where login = '%s' and mdp='%s'",request('login'),request('mdp'));
           //echo $req;
           $resultat = DB::select($req);


           
           
           if(count($resultat)!=0){
               $req1 = sprintf("SELECT distinct(a.idAgriculteur), v.idVulgarisateur, a.pdp pdpA, a.nom nomA, a.prenom prenomA FROM agriculteurs a JOIN chats c on c.idAgriculteur = a.idAgriculteur join  vulgarisateurs v on v.idVulgarisateur=c.idVulgarisateur where v.idVulgarisateur = %d ", $resultat[0]->idVulgarisateur);
               $resultat1 = DB::Select($req1);


               $req2 = sprintf("SELECT c.idVulgarisateur, c.idAgriculteur, c.texte, c.sender FROM agriculteurs a JOIN chats c on c.idAgriculteur = a.idAgriculteur join  vulgarisateurs v on v.idVulgarisateur=c.idVulgarisateur where v.idVulgarisateur = %d ", $resultat[0]->idVulgarisateur);
               $resultat2 = DB::Select($req2);

               session(['idVulgarisateur' => $resultat[0]->idVulgarisateur]);
               

                //PROFIL VULGARISATEUR
           /*$reqProfil = sprintf("select nom,prenom,pdp,adresse,ddn,login,contact,domaines.nomDomaine as nomDomaine from vulgarisateurs join relVulgarisateur_domaines on relVulgarisateur_domaines.idVulgarisateur = vulgarisateurs.idVulgarisateur join domaines on domaines.idDomaine = relVulgarisateur_domaines.idDomaine where idVu=%d",$resultat[0]->idAgriculteur);
*/
               return view('accueilVulgarisateur', ['monProfil' => $resultat, 'listeAgriculteur' => $resultat1, 'listeMessage' => $resultat2, "listeActivite" => $listeActivite, 'listePublication' => $listePublication]);
           }else{
               return view('home',['message' => "Veuillez verifier votre login et votre mot de passe"]);
           }
       }

       if(request('profile') == 'Décideurs'){
          
           $req= sprintf("select * from vips where login = '%s' and mdp='%s'",request('login'),request('mdp'));
        //    echo $req;
           $resultat = DB::select($req);
           if(count($resultat)!=0){
                session(['idVIP' => $resultat[0]->idVIP]);
               return view('VIP/index');
           }else{
               return view('home',['message' => "Veuillez verifier votre login et votre mot de passe"]);
           }
       }

       //Raha tsiy izy tel
       else{
           
               return view('home',['message' => 'other' ]);
           

       }
     
   }
   //INSCRIPTION
   
   public function inscription(){
       echo request("profile");

       if(request('profile') == 'Agriculteurs'){
           DB::table('agriculteurs')->insert([
           'login' => request('login'),
           'mdp' => request('mdp'),
           'nom' => request('nom'),
           'prenom'=> request('prenom'),
           'adresse' => request('adresse'),
           'ddn' => request('ddn'),
           'contact' => request('contact')
          
            ]);
            echo "go1";
       }
        if(request('profile') == 'Vulgarisateurs'){

           DB::table('vulgarisateurs')->insert([
               'login' => request('login'),
               'mdp' => request('mdp'),
               'nom' => request('nom'),
               'prenom'=> request('prenom'),
               'adresse' => request('adresse'),
               'ddn' => request('ddn'),
               'contact' => request('contact')
            ]);
           echo "go2";
           
        }
        return view('home',['message' => "Inscription effectué." ]);
   }


   //RECHERCHE
 

   public function traitementRecherche(Request $request){
         $listeActivite = DB::Select("select vulgarisateurs.nom,titre,activite,date from activites join vulgarisateurs on vulgarisateurs.idVulgarisateur = activites.idVulgarisateur");
    $listePublication = DB::Select("select vulgarisateurs.nom,date,photo,texte from publications join vulgarisateurs on vulgarisateurs.idVulgarisateur = publications.idVulgarisateur");
     
    $listeDomaine =  DB::Select("select * from domaines");
       //$motcle =  request('recherche');
       $req= sprintf("select idVulgarisateur,nom,prenom,adresse,contact,nomDomaine from Vulgarisateurs join domaines on domaines.idDomaine = vulgarisateurs.idDomaine where vulgarisateurs.idDomaine = %d",request('idDomaine'));     
    
       $resultat = DB::Select($req);

       //var_dump($resultat);
        return view('resultatRecherche',['resultatRecherche' =>  $resultat]);

   }



    public function versFicheVulgarisateur(){
        // $value = $request->session()->get('key');
        $value = session('IdVulgarisateur');
        $idVulgarisateur = 1;
        if($value != null) {
            $idVulgarisateur = $value;
        }
        $activite=DB::select("select * from activites where idVulgarisateur=".$idVulgarisateur);
        $vulgarisateur = DB::select('select * from vulgarisateurs where idVulgarisateur = '.$idVulgarisateur);
        $publications = DB::select('select * from publications join vulgarisateurs on (vulgarisateurs.idVulgarisateur=publications.idVulgarisateur) where vulgarisateurs.idVulgarisateur = '.$idVulgarisateur);
        $domaines = DB::select('select * from vulgarisateurs join relVulgarisateur_domaines on (relVulgarisateur_domaines.idVulgarisateur=vulgarisateurs.idVulgarisateur) join domaines on (domaines.idDomaine=relVulgarisateur_domaines.idDomaine) where vulgarisateurs.idVulgarisateur = '.$idVulgarisateur);
        return view('ficheVulgarisateur', ['activite'=> $activite,'vulgarisateur' => $vulgarisateur, 'publications' => $publications, 'domaines' => $domaines]);
    }
    public function versRechercheVulgarisateur(){
        return view('rechercheVulgarisateur');
    }

    // public function mofifierProfilV() {
    //     echo "asdonfjsdn jsd swj sld lsdk s ";
    //     $pdp = request('pdp');
    //     $login = request('login');
    //     $contact = request('contact');


    //     $target_dir = "../../../public/images/";
    //     $target_file = $target_dir . basename($_FILES["pdp"]["name"]);
    //     $uploadOk = 1;
    //     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        
    //     // Check if file already exists
    //     if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    //     }

    //     if (move_uploaded_file($_FILES["pdp"]["tmp_name"], $target_file)) {
    //         echo "The file ". htmlspecialchars( basename( $_FILES["pdp"]["name"])). " has been uploaded.";
    //     } else {
    //         echo "Sorry, there was an error uploading your file.";
    //     }

    // }

    public function mofifierProfilV(Request $request)
    {
        $path = $request->file('pdp')->store('pdp');

        return $path;
    }

    public function getData(){
        
        $listeEmplacement = DB::select("select * from localisation_vulgarisateurs");
        $valiny = array();
        $i=0;
        foreach($listeEmplacement as $ls){
        /*echo $ls->longitude;
        echo $ls->latitude;*/
            $valiny[$i]['lng'] = $ls->longitude;
            $valiny[$i]['lat'] = $ls->latitude;
            $i++;
        }
        echo json_encode($valiny);
    }
    public function getCarte(){
       
        return view('carte');
    }

    public function message(Request $req) {
        $listeActivite = DB::Select("select vulgarisateurs.nom,titre,activite,date from activites join vulgarisateurs on vulgarisateurs.idVulgarisateur = activites.idVulgarisateur");
        $idAgriculteur = $req->input('idAgriculteur');
        $idVulgarisateur = $req->input('idVulgarisateur');
        $sender = $req->input('sender');
        $texte = $req->input('texte');
        $requete = sprintf("insert into chats values (null, %d, %d, '%s', '%s')", $idVulgarisateur, $idAgriculteur, $texte, $sender);
        if(DB::insert($requete)) {
            $req= sprintf("select * from agriculteurs where idAgriculteur = %d",$idAgriculteur);
            $resultat = DB::select($req);
            $publications = Publications::all();
            $auteur=array();
            foreach($publications as $pub){
                $auteur = $this->getNomVulgarisateurFromId($pub->idVulgarisateur);
            }
            $req1 = sprintf("SELECT distinct(a.idAgriculteur), v.idVulgarisateur, v.pdp pdpV, v.nom nomV, v.prenom prenomV FROM agriculteurs a JOIN chats c on c.idAgriculteur = a.idAgriculteur join  vulgarisateurs v on v.idVulgarisateur=c.idVulgarisateur where a.idAgriculteur = %d ", $idAgriculteur);
            $resultat1 = DB::Select($req1);

            $req2 = sprintf("SELECT c.idVulgarisateur, c.idAgriculteur, c.texte, c.sender FROM agriculteurs a JOIN chats c on c.idAgriculteur = a.idAgriculteur join  vulgarisateurs v on v.idVulgarisateur=c.idVulgarisateur where a.idAgriculteur = %d ", $idAgriculteur);
            $resultat2 = DB::Select($req2);

            session(['idAgriculteur' => $resultat[0]->idAgriculteur]);

            return view('accueilAgriculteur',['publication'=> $publications ,'auteur' => $auteur, 'listeVulgarisateur' => $resultat1, 'listeMessage' => $resultat2, "listeActivite" => $listeActivite])->with('idAgriculteur',$idAgriculteur);
        }
    }

}
