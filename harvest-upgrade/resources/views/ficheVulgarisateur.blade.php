<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}" ></script>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    
	<title>Harvest | Fiche Vulgarisateur</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('images/harvest.ico') }}" /><link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/harvest.ico') }}" />
</head>
<body>
    <aside class="sidebar">
      <div class="toggle">
        
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
              <span></span>
            </a>
      </div>
      <div class="side-inner">

        <div class="profile">
          <img src="grand.jpg" alt="Image" class="img-fluid">
          <h3 class="name">Craig David</h3>
          <span class="country">Web Designer</span>
        </div>

        
        <div class="nav-menu">
          <ul>
            <li class="accordion">
              <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsible">
                <span class="icon-home mr-3"></span>Acceuil
              </a>
            </li>
            <li class="accordion">
              <a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsible">
                <span class="icon-search2 mr-3"></span>Recherche Vulgarisateur
              </a>
            </li>
            <li class="accordion">
                <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsible"><span class="icon-location-arrow mr-3"></span>Autre</a>
            </li>
            <li class="accordion">
                <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsible"><span class="icon-sign-out mr-3"></span>Deconnexion</a>
            </li>
          </ul>
        </div>
      </div>
      
    </aside>
	<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h1><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        </svg>
                                        Profile Vulgarisateur</h1>
                                    <h3>
                                        <em>
                                        {{ $vulgarisateur[0]->nom }} {{ $vulgarisateur[0]->prenom }}</em>
                                    </h3>
                                    <h6>
                                      <?php $tmp = "" ?>
                                      @foreach ($domaines as $dom)
                                          <?php $tmp = $tmp." ".$dom->nomDomaine ?>
                                      @endforeach
                                      {{ $tmp }}
                                    </h6>
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 right">
                        <div class="profile-work">

                        </div>
                    </div>
                    <div class="col-md-8 fd">
                      
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="publication-tab" data-bs-toggle="tab" data-bs-target="#publication" type="button" role="tab" aria-controls="publication" aria-selected="true">Publication</button>
                            </li>
                           <li class="nav-item" role="presentation">
                                <button class="nav-link" id="activite-tab" data-bs-toggle="tab" data-bs-target="#activite" type="button" role="tab" aria-controls="activite" aria-selected="false">Activite</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="message-tab" data-bs-toggle="tab" data-bs-target="#message" type="button" role="tab" aria-controls="message" aria-selected="false">Message</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="emplacement-tab" data-bs-toggle="tab" data-bs-target="#emplacement" type="button" role="tab" aria-controls="emplacement" aria-selected="false">Emplacement</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="apropos-tab" data-bs-toggle="tab" data-bs-target="#apropos" type="button" role="tab" aria-controls="apropos" aria-selected="false">A propos</button>
                            </li>
                        </ul>
                    <div class="tab-content" id="myTabContent" style="margin-top: 5%;">
                        <div class="tab-pane fade show active" id="publication" role="tabpanel" aria-labelledby="publication-tab">
                            <div class="contentdiv" >
                                <h3>Tous ces publications</h3>
                                <div class="mg-box">
                                  <?php foreach ($publications as $pub) { ?>
                                    <div class="post">
                                        <div class="post_avatar">
                                          <?php $pdp = "images/".$pub->pdp ?>
                                          <img src="<?php echo asset($pdp) ?>">
                                        </div>
                                        <div class="post-body">
                                          <div class="post-header">
                                            <div class="post-headerText">
                                              <h3>{{ $pub->nom }} {{ $pub->prenom }}</h3>
                                            </div>
                                            <div class="post-headerDescription" style="margin-top: -10px">
                                              <p>Le {{ $pub->date }}</p>
                                            </div>    
                                          </div>  
                                          <div class="img-pub">
                                            {{ $pub->texte }}<br>
                                            <?php if($pub->photo != null) { ?>
                                              <?php $photo = "images/".$pub->photo ?>
                                              <img src="<?php echo asset($photo) ?>" style="width: 80%;">
                                            <?php } ?>
                                          </div>
                                          
                                          <div class="post-footer">
                                            
                                          </div>
    
                                        </div>
                                    </div>
                                  <?php } ?>
                            </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="activite" role="tabpanel" aria-labelledby="activite-tab">
                            <div class="contentdiv" >
                                <h3>Activite</h3>
                                <div class="mg-box">
                                    @foreach($activite as $a)
                                      <div class="act-card">
                                        <h2>{{ $a->titre}}</h2>
                                        <h5>{{ $a->activite}}</h5>
                                        <h6>Le {{$a->date}}</h6>
                                      </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="message" role="tabpanel" aria-labelledby="message-tab">
                            <div class="contentdiv" >
                                <div class="nav-item-title">
                                    <h3>Message </h3>
                                </div>
                                <div class="mg-box">
                                    <div class="mg mg-r">
                                        Hey,I'm Jonah and I'm here to help you.
                                    </div>
                                    <div class="mg mg-l">
                                       Oh really, Thank you Though xD .Lol LDAOKODZAOKOKDOZAKOOOO dzadzadaz
                                       kaookzdoko okod
                                    </div>
                                    <div class="mg mg-r">
                                        Yamete kudasai , onee-channn yameetteee
                                    </div>
                                    <div class="mg mg-l">
                                       I think I'm the one who gonna help here 
                                    </div>
                                    <div class="mg mg-l">
                                       so lets get started
                                    </div>
                                    <div class="mg mg-r">
                                       Ok bobo
                                    </div>
                                    <div class="mg mg-r">
                                       btw ...
                                    </div>
                                    <div class="mg mg-r">
                                       olo
                                    </div>
                                </div>
                                <div class="mg-envoyer">
                                    <form class="row">
                                        <div class="input-group">
                                          <textarea class="form-control" placeholder="Text..." aria-label="With textarea"></textarea>
                                          <button class="btn btn-primary">Envoyer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="emplacement" role="tabpanel" aria-labelledby="emplacement-tab">
                            <div class="contentdiv" >
                                <h3>Emplacement du vulgarisateur</h3>
                                <div class="mg-box">
                                  
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="apropos" role="tabpanel" aria-labelledby="apropos-tab">
                            <div class="contentdiv" >
                              <h3>A propos du vulgarisateur</h3>

                              <div class="col-md-10 right">
                                <div class="profile-img">
                                    <?php $pdp = "images/".$vulgarisateur[0]->pdp ?>
                                    <img src="<?php echo asset($pdp) ?>"  class="rounded mb-2 img-thumbnail" alt="profil"/>
                                </div>
                            </div>
                              <div class="mg-box">
                                <em>
                               <p><b>Nom:</b> {{ $vulgarisateur[0]->nom }}</p>
                               <hr class="line">
                               <p><b>Prénom:</b> {{ $vulgarisateur[0]->prenom }}</p>
                               <hr class="line">
                               <p class="text-pink"><b>Email:</b> {{ $vulgarisateur[0]->login }}</p>
                               <hr class="line">
                               <p><b>Contact:</b> {{ $vulgarisateur[0]->contact }}</p>
                               <hr class="line">

                               
                               <p><b>Date de Naissance:</b> {{ $vulgarisateur[0]->ddn }}</p>
                               <hr class="line">
                               <p><b>Adresse:</b> {{ $vulgarisateur[0]->adresse }}</p>
                               <hr class="line">
                               </em>
                              </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </form>           
        </div>

</body>
</html>