<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styleVulgarisateur.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Harvest | Accueil vulgarisateur</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/harvest.ico') }}" /><link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/harvest.ico') }}" />
    <style>
      .mg-box::-webkit-scrollbar { width: 5px; }
      .mg-box::-webkit-scrollbar-track { background-color: #e4e4e4;border-radius: 100px; }
      .mg-box::-webkit-scrollbar-thumb { background-color: #d4aa70;border-radius: 100px; }
    </style>
  </head>
  <body>
   
    <nav class="navbar" id="header">
        <div class="container-fluid">
          <a class="navbar-brand" id="text-logo" >HARVEST</a>
          <a href="/deconnect" class="navbar-brand" id="text-logo">DÉCONNEXION</a>
          
        </div>
    </nav>
    <!-- Optional JavaScript; choose one of the two! -->


    <nav style="border-bottom: 2px #dfe3e3 solid;height: 100px;">
        <div  class="nav nav-pills nav-fill "  id="nav-menu" style="height:75px;" role="tablist">
          <button class="nav-link" id="nav-home-tab"  data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" >Accueil</button>
          <button class="nav-link " id="nav-message-tab" data-bs-toggle="tab" data-bs-target="#nav-message" type="button" role="tab" aria-controls="nav-message" aria-selected="false" >Message</button>
        
          <button class="nav-link" id="nav-profil-tab" data-bs-toggle="tab" data-bs-target="#nav-profil" type="button" role="tab" aria-controls="nav-profil" aria-selected="true">Profil</button>
          <button class="nav-link" id="nav-activite-tab" data-bs-toggle="tab" data-bs-target="#nav-activite" type="button" role="tab" aria-controls="nav-activite" aria-selected="false" >Activités</button>
          
        </div>
      </nav>

      <div class="tab-content" id="nav-tabContent">
        <!--ACTIVITE-->
        <!--END ACTIVITE-->

        <!--HOME-->
        <div class="tab-pane fade" id="nav-activite" role="tabpanel" aria-labelledby="nav-activite-tab">
            <div class="row" id="container">
                <!--RECHERCHE---->
                <div class="col-md-2" id="card-activity" >
                  <h6 style="margin: 10px;font-size: 16px;font-weight: 600;font-family: open sans;">Ajouter une activité</h6>
                  <form action="creerActivite" method = "POST" class="form-group" >
                      @csrf
                        <input type="texte" name = "titre" class="form-control" style="margin: 5px;">
                        <textarea  name = "activite"  class="form-control" style="margin: 5px;" ></textarea>
                        <button type="submit" class="btn btn-outline-success" style="margin: 5px;">Valider</button>
                  </form>
                </div>


                
                <div class="col-md-9" id="card-activity" style =" height:300px; overflow:scroll" >
                  @foreach ($listeActivite as $la) 
                    <div class="jumbotron" id="jumbo" >
                    <h1 class="display-4" id="titre-activite">{{ $la->titre }}</h1>
                    
                    <hr class="my-4">
                    <p>{{ $la->activite }}</p>
                    <p>{{ $la->date }}</p>
                    <p class="lead">
                      {{ $la->nom }}
                    </p>
                    </div>
                    @endforeach
                  </div>
                 


            

            </div>
        </div>
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="row" id="container">

            <!--RECHERCHE---->
            <div class="col-md-2" id="search-box"> 


               <div class="new-post">
                <div class="new-post-header">
                    {{-- <img class="new-post-img" src="avatar.jpg" width="45" alt> --}}
                    <button id="insertform" type="button"  class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#newp" data-bs-whatever="@mdo">
                      Insérer une publication 
                      <svg xmlns="http://www.w3.org/2000/svg" width="50" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                      </svg>
                    </button>
                </div>
                <hr>
                <div>
                  {{-- <button class="btn btn-blue text-center" style="background-color: #27c975; border-radius: 10px">Mettre à jour ma position</button> --}}
                  <form id="geolocation" onLoad="getCoordPosition();" method="POST" action="/localisation">
                  </form>
                  @if (isset($successLocalisation))
                      @if ($successLocalisation)
                          <script>alert("Votre localisation a bien été mise à jour")</script>
                      @else
                      <script>alert("Une erreur s'est produite, votre localisation n'a pas été mise à jour")</script>
                      @endif
                  @endif
                </div>
              </div>


            </div>
            <!--END RECHERCHE-->
            
            <div class="col-md-9" id="post">
              
              <div class="modal fade" id="newp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Créer une publication</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="creerPublication" method="POST" enctype="multipart/form-data" >
                      @csrf
                      <div class="modal-body" id="box-comment">
                        <div class="mb-3">
                          <textarea name="texte" class="form-control" id="message-text" placeholder="Ecrivez quelque chose..."></textarea>
                        </div>
                        <div class="custom-file">
                            <input name="file" type="file" class="custom-file-input" id="validatedCustomFile" required>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Publier</button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
              
              <h4 style="margin-left: 10px;font-size: 20px;font-weight: 600;border-bottom: 1px solid #EBECE9;padding: 10px;font-family: open sans;"> Publications</h4> 
                
              @foreach ($listePublication as $lp)
                <div class="row" id="main">
                    <div class="row" id="post-header">
                     <!-- <div class="col-md-1" id="post-avatar"><img src="{{ asset($lp->photo) }}"></div>-->
                      <div class="col-md-
                      " id="post-headerText"><h4><a href="#">{{ $lp->nom}}</a></h4>
                        <p>{{ $lp->date}}</p></div>
                    </div>
                    <div class="post-body">
                      <div class="post-description">{{ $lp->texte}}</div>
                      <div class="post-image"><img src="{{ asset($lp->photo) }}"></div>
                    </div>
                </div>
              @endforeach

            </div>
         

        </div>
        
      
       </div>


       <!--PROFIL-->
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
                                      <b>{{ $monProfil[0]->nom }} {{ $monProfil[0]->prenom }}</b>
                                    </h5><br><br>
                                    <p><strong>Parcours académique:</strong>  {{ $monProfil[0]->parcoursAcademique }}</p>
                                   
                           
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            
                            <p><strong>Experience Professionnelle:</strong>  {{ $monProfil[0]->experiencePro }}</p>
                            <p><strong>Formation:</strong>  {{ $monProfil[0]->formation }}</p>
                            
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nom complet:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $monProfil[0]->nom }} {{ $monProfil[0]->prenom }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $monProfil[0]->login }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Téléphone:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $monProfil[0]->contact }}</p>
                                            </div>
                                        </div>
                                        
                            </div>
                          
                        </div>
                    </div>
                </div>
            </form>           
        </div>
        </div>

        <!--MESSAGE-->
        <div class="tab-pane fade" id="nav-message" role="tabpanel" aria-labelledby="nav-message-tab">
            <div class="accordion" id="accordionExample">
              @foreach ($listeAgriculteur as $la)
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="<?php echo "#".$la->nomA ?>" aria-expanded="false" aria-controls="<?php echo $la->nomA ?>">
                        <div>
                            <img src="{{ asset('images/'.$la->pdpA) }}" >
                            <strong>{{ $la->nomA }}</strong>
                        </div>
                    </button>
                  </h2>
                  <div id="<?php echo $la->nomA ?>" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="container">
                      <div class="accordion-body" >
                          <div class="mg-box">
                              @foreach ($listeMessage as $lm)
                                @if ($lm->idVulgarisateur == session()->get('idVulgarisateur') && $lm->idAgriculteur == $la->idAgriculteur)
                                  @if ($lm->sender == 'a')
                                    <div class="mg mg-l">
                                      {{ $lm->texte }}
                                    </div>
                                  @endif
                                  @if ($lm->sender == 'v')
                                    <div class="mg mg-r">
                                      {{ $lm->texte }}
                                    </div>
                                  @endif
                                @endif
                              @endforeach
                          </div>
                          <form action="traitementMessageV" method="post" class="row" id="sendbox">
                            <div class="input-group" style="width:50%;">
                              @csrf
                              <input type="hidden" name="sender" value="v">
                              <input type="hidden" name="idAgriculteur" value="{{ $la->idAgriculteur }}">
                              <input type="hidden" name="idVulgarisateur" value="{{ session()->get('idVulgarisateur') }}">
                              <textarea class="form-control" placeholder="Ecrire votre message" style="height: 80px;" name="texte"></textarea>
                              <button class="btn btn-outline-success" style="height: 50px;background: #04AA6D;margin-left: 10px;margin-top:10px;border-radius: 20%;" > <span class="material-icons" id="send">send</span></button>
                            </div>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
      </div>


       <!-- Site footer -->
    <footer class="site-footer">
     
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">HARVEST MADAGASCAR
      
            </p>
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
    <script type="text/javascript">
      if(navigator.geolocation){
          navigator.geolocation.getCurrentPosition(function(position){
              var latitude  = position.coords.latitude;
              var longitude = position.coords.longitude;
              var altitude  = position.coords.altitude;
              document.getElementById('geolocation').innerHTML = '@csrf<input type="hidden" name="latitude" value="' + latitude + '">'
                  + '<input type="hidden" name="longitude" value="' + longitude + '">'
                  + '<button class="btn btn-blue text-center" style="background-color: #27c975; border-radius: 10px">Mettre à jour ma position</button>';
          });
      }
      </script>
  </body>
</html>