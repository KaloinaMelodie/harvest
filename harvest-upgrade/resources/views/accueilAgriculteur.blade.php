<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


     <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script>
        function export_to_pdf() {
    html2canvas(document.getElementById("carteId"), {
        useCORS: true,
        onrendered: function(canvas) {
            var img =canvas.toDataURL("image/jpeg,1.0");
            var pdf = new jsPDF();

            pdf.addImage(img, 'JPEG', 0, 50, 210, 115);
            pdf.save('harvest.pdf')
        }
    });
}
        
    </script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styleAgriculteur.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" type="{{ asset('css/bootstrap.bundle.min.css') }}" href="">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

<script type="text/javascript"
src="https://maps.googleapis.com/maps/api/js?sensor=false">
 
</script>
<style type="text/css">
html { height: 100% }
body { height: 100%; margin: 0; padding: 0 }
      #carteId{ height: 500px ;width:100%;border:5px solid #26272B ;  box-shadow: 0px 0px 20px -5px black;}
</style>

<?php 
  
  use Illuminate\Support\Facades\DB;
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
   
?>
<style type="text/css">
html { height: 100% }
body { height: 100%; margin: 0; padding: 0 }
      #carteId{ height: 500px ;width:100%;border:5px solid #26272B ;  box-shadow: 0px 0px 20px -5px black;}
</style>

<script type="text/javascript">
function initialize() {

  var mapOptions = {
    center: new google.maps.LatLng(-18.986021, 47.532735),
    zoom: 6,
    mapTypeId:google.maps.MapTypeId.ROADMAP
      };
  var carte = new google.maps.Map(document.getElementById("carteId"),mapOptions);
  var liste = <?php echo json_encode($valiny,JSON_NUMERIC_CHECK); ?>;
  for(var i=0;i<liste.length;i++){

    var location = new google.maps.LatLng(liste[i]['lat'], liste[i]['lng']);
      var marker = new google.maps.Marker({
      position: location,
      draggable: false,        
      map: carte
    }); 
  }
        
  // var sel=document.getElementById("dom");
  // sel.addEventListener('change',function(){
  //   var id=document.getElementById("dom").value;
  //   alert(id);
  //   data=new FormData();
  //   data.append('ide',id);
  // });
}
function changeDomaine()
{
    
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>


    <title>Harvest | Accueil agriculteur</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/harvest.ico') }}" /><link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/harvest.ico') }}" />
    <style>
      .mg-box::-webkit-scrollbar{
    width: 5px;
}
 
.mg-box::-webkit-scrollbar-track {
    background-color: #e4e4e4;
    border-radius: 100px;
}
 
.mg-box::-webkit-scrollbar-thumb {
    background-color: #d4aa70;
    border-radius: 100px;
}
    </style>
  </head>
  <body>
    
   
    <nav class="navbar" id="header">
        <div class="container-fluid">
          <a class="navbar-brand" id="text-logo" >HARVEST</a>
          <a href="/deconnect" class="navbar-brand" id="text-logo" style="font-size:10px;background: #26272B;">Deconnexion</a>
          
        </div>
    </nav>
    <!-- Optional JavaScript; choose one of the two! -->


    <nav style="border-bottom: 2px #dfe3e3 solid;height: 100px;">
        <div  class="nav nav-pills nav-fill "  id="nav-menu" style="height:75px;" role="tablist">
             <button class="nav-link" id="nav-home-tab"  data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" >Accueil</button>
         
          <button class="nav-link " id="nav-message-tab" data-bs-toggle="tab" data-bs-target="#nav-message" type="button" role="tab" aria-controls="nav-message" aria-selected="false" >Message</button>
          <button class="nav-link" id="nav-carte-tab" data-bs-toggle="tab" data-bs-target="#nav-carte" type="button" role="tab" aria-controls="nav-carte" aria-selected="true">Carte</button>
           <button class="nav-link" id="nav-profil-tab" data-bs-toggle="tab" data-bs-target="#nav-profil" type="button" role="tab" aria-controls="nav-profil" aria-selected="true">Profil</button>
             <button class="nav-link" id="nav-activite-tab"  data-bs-toggle="tab" data-bs-target="#nav-activite" type="button" role="tab" aria-controls="nav-activite" aria-selected="false" >Activités</button>
          
        </div>
      </nav>

      <div class="tab-content" id="nav-tabContent">
        <!--PAGE RECHERCHE-->
        <div class="tab-pane fade" id="nav-recherche" role="tabpanel" aria-labelledby="nav-recherche-tab">
             <aside class="sidebar">

      <div class="toggle">
        
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">

              <span></span>
            </a>
      </div>
      
      
    </aside>

        </div>
        <!--END PAGE RECHERCHE-->

        <!--CARTE-->

        <div class="tab-pane fade" id="nav-carte" role="tabpanel" aria-labelledby="nav-carte-tab">
            
           
            <div class="row">
                 
                <div class="col-md-12">
                      <div id="carteId"></div>
                 </div>
              
                
            </div>
        </div>
        <!--END CARTE-->

        <!--ACTIVITE-->
        <div class="tab-pane fade" id="nav-activite" role="tabpanel" aria-labelledby="nav-activite-tab">
            <div class="row" id="container">
                <!--RECHERCHE---->
                <div class="col-md-2" id="search-box"> <p style="font-size: 16px;font-weight: 600;">Trouvez des vulgarisateurs</p>
                    <form action="traitementRecherche" method="get">           

                             <select name="idDomaine" class="form-select" aria-label="Default select example" id="select-perso">
                          @if(isset($listeDomaine))
                            @foreach($listeDomaine as $ld)
                                <option value="{{ $ld->idDomaine}}">{{$ld->nomDomaine}}</option>
                             @endforeach 
                        @endif
                         </select>
                        
                           
                            <button class="btn" id="btn-validate" type="submit" data-bs-toggle="tab" data-bs-target="#nav-recherche" type="button" role="tab" aria-controls="nav-recherche" aria-selected="true" style="border-radius: 10px;"><span class="material-icons">search</span></button>
                       
                    </form>
                </div>
                    @if(isset($listeActivite))
                <div class="col-md-9" id="card-activity">
                
                    @foreach($listeActivite as $la)
                        <div class="jumbotron" id="jumbo-activite-main" >
                            <h1 class="display-4" id="titre-activite">{{$la->titre}} </h1>
                            <p class="lead">{{$la->activite}} </p>
                            <hr class="my-4">
                            <p>{{$la->date}} </p>
                            <p class="lead">
                            @if(isset($la->nom))
                             {{$la->nom}} 
                            </p>
                            @endif
                        </div>
                    @endforeach
                   
                </div>
                 @endif
            </div>
        </div>
        <!--END ACTIVITE-->

        <!--POST-->
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="row" id="container">
            <!--RECHERCHE---->
            <div class="col-md-2" id="search-box"> <h6 style="font-size: 18px;font-weight: 800;font-family: open sans;">Recherche </h6>
                <p style="font-family: corbel;">Trouver les vulgarisateurs de votre choix</p>
               <form action="traitementRecherche" method="get">           

                             <select name="idDomaine" class="form-select" aria-label="Default select example" id="select-perso">
                            @if(isset($listeDomaine))
                                @foreach($listeDomaine as $ld)
                                    <option value="{{ $ld->idDomaine}}">{{$ld->nomDomaine}}</option>
                                 @endforeach 
                            @endif
                         </select>
                        
                          
                            <button class="btn" id="btn-validate" type="submit" data-bs-toggle="tab" data-bs-target="#nav-recherche" type="button" role="tab" aria-controls="nav-recherche" aria-selected="true" style="border-radius: 10px;"><span class="material-icons">search</span></button>
                       
                    </form>
            </div>
            <!--END RECHERCHE-->
            
            <div class="col-md-6" id="post">
              <h4 style="margin-left: 10px;font-size: 20px;font-weight: 600;border-bottom: 1px solid #EBECE9;padding: 10px;"> Publications</h4> 
            
            <!--DEBUT PUBLICATION-->
           @if(isset($listePublication))
               @foreach($listePublication as $lp)
                <div class="row" id="main">
                                          <div class="row" id="post-header">
                                            <div class="col-md-1" id="post-avatar"><img src="{{asset('images/avatar.png')}}"></div>
                                            <div class="col-md-10" id="post-headerText"><h4><a href="#">{{$lp->nom}}</a></h4>

                                              <p>{{$lp->date}}</p></div>
                                              
                                          </div>
                                          <div class="post-body">
                                             <div class="post-description">{{$lp->texte}}</div>
                                            <div class="post-image"><img src="{{ asset('images/'.$lp->photo) }}"></div>
                                           
                       

                        
                                          </div>
              </div>
              @endforeach
              @endif


              



            </div>
           
             <div class="col-md-3" id="activite">
              <div class="jumbotron" id="jumbo" >
                <h1 class="display-4" id="titre-activite">Activité récent</h1>
                <p class="lead">Une activité pour les horiculteurs aura lieu ce vendredi au niveau des communes rurales.</p>
                <hr class="my-4">
                <p>29 Octobre 2021</p>
                <p class="lead">
                  Niavo Tiana
                </p>

              </div>

            

             </div>

        </div>
      
       </div>
        <!--END POST-->

       <!--PROFIL-->
    @if(isset($profil))
       @foreach($profil as $pf)
        <div class="tab-pane fade" id="nav-profil" role="tabpanel" aria-labelledby="nav-profil-tab">
          <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="{{asset('images/avatar.png')}}" alt=""/>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {{$pf->nom}}
                                    </h5>
                                    <h6>
                                        {{$pf->prenom}}
                                    </h6>
                                   
                           
                        </div>
                    </div>
                    <div class="col-md-2">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                       
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nom complet</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$pf->nom." ".$pf->prenom}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$pf->login}}</p>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <label>Adresse</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$pf->adresse}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Contact</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$pf->contact}}</p>
                                            </div>
                                        </div>
                                       
                            </div>
                          
                        </div>
                    </div>
                </div>
            </form>           
        </div>
        </div>

        @endforeach
    @endif
        <!--MESSAGE-->
        <div class="tab-pane fade" id="nav-message" role="tabpanel" aria-labelledby="nav-message-tab">
            


            <div class="accordion" id="accordionExample">
             @if(isset($listeVulgarisateur))  

              @foreach ($listeVulgarisateur as $lv)
                  
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="<?php echo "#".$lv->nomV ?>" aria-expanded="false" aria-controls="<?php echo $lv->nomV ?>">
                        <div>
                            <img src="{{ asset('images/'.$lv->pdpV) }}" >
                            <strong>{{ $lv->nomV }}</strong>
                        </div>
                    </button>
                  </h2>
                  <div id="<?php echo $lv->nomV ?>" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="container">
                      <div class="accordion-body" >
                          <div class="mg-box">
                              @foreach ($listeMessage as $lm)
                                @if ($lm->idAgriculteur == session()->get('idAgriculteur') && $lm->idVulgarisateur == $lv->idVulgarisateur)
                                  @if ($lm->sender == 'v')
                                    <div class="mg mg-l">
                                      {{ $lm->texte }}
                                    </div>
                                  @endif
                                  @if ($lm->sender == 'a')
                                    <div class="mg mg-r">
                                      {{ $lm->texte }}
                                    </div>
                                  @endif
                                @endif
                              @endforeach
                          </div>

                          <form action="traitementMessageA" method="post" class="row" id="sendbox">
                            <div class="input-group" style="width:50%;">
                              @csrf
                              <input type="hidden" name="sender" value="a">
                              <input type="hidden" name="idVulgarisateur" value="{{ $lv->idVulgarisateur }}">
                              <input type="hidden" name="idAgriculteur" value="{{ session()->get('idAgriculteur') }}">
                              <textarea class="form-control" placeholder="Ecrire votre message" style="height: 80px;" name="texte"></textarea>
                              <button class="btn btn-outline-success" style="height: 50px;background: #04AA6D;margin-left: 10px;margin-top:10px;border-radius: 20%;" > <span class="material-icons" id="send">send</span></button>
                            </div>
                          </form>

                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
              @endif
              </div>




        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
      </div>


       <!-- Site footer -->
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">

            <h6>HARVEST MADAGASCAR</h6>
          
          </div>

          <div class="col-xs-6 col-md-3">
                    
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Voir la carte en mode offline</h6>
            <button class="btn btn-success" onclick="export_to_pdf()">Exporter en PDF</button>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
           
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->

  </body>
</html>