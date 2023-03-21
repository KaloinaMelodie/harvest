<?php use Illuminate\Support\Facades\DB; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="icon" type="image/x-icon" href="{{ asset('images/harvest.ico') }}" /><link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/harvest.ico') }}" />
  <title>Harvest | Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('img/favicon.png')}}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/boxicons/css/boxicons.min.')}}" rel="stylesheet">
  <link href="{{asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bethany - v4.6.0
  * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light"><a href="/"><span>HARVEST</span></a></h1>
          
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="{{asset('img/logo.png')}}" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Accueil</a></li>
             <li><a class="nav-link scrollto" href="#about">A propos</a></li>
            <li><a class="nav-link scrollto" href="#why-us">Services</a></li>
           
            <li><a class="nav-link scrollto" href="#team">Équipes</a></li>
            
           
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li><a class="getstarted scrollto" href="loginpage">Se connecter</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>L'innovation technologique pour l'agriculture</h1>
      <h2>Réunir tous les agriculteurs et les vulgarisateurs au même endroit</h2>
      <a href="#about" class="btn-get-started scrollto">Découvrir</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <div id="google_translate_element"></div>
            <h2>HARVEST MADAGASCAR</h2>
            <h3>Les nouvelles technologies au service de l'agriculture.</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
            <p>
              Nous avons constaté depuis ces dernières années que l'agriculture malgache ne cesse de décroitre que cela soit en terme de productivité et de rendement à cause du manque de techniques et d'informations. Afin de remédier à ce problème, nous avons conçu ce réseau social pour favoriser la vulgarisation au niveau de l'agriculture.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Interface et prise en main simplifiée</li>
              <li><i class="ri-check-double-line"></i> Recherche rapide et efficace</li>
              <li><i class="ri-check-double-line"></i> Ressources abondantes et à jour</li>
            </ul>
            <p class="fst-italic">
              Un moyen de communication facile entre les vulgarisateurs agricoles et les agriculteurs.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <?php
              $reqNbVulg = "select count(*) nb from vulgarisateurs";
              $resNbVulg = DB::select($reqNbVulg);
            ?>
            <span data-purecounter-start="0" data-purecounter-end="{{ $resNbVulg[0]->nb }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Vulgarisateurs</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <?php
              $reqNbAgr = "select count(*) nb from agriculteurs";
              $resNbAgr = DB::select($reqNbAgr);
            ?>
            <span data-purecounter-start="0" data-purecounter-end="{{ $resNbAgr[0]->nb }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Agriculteurs</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <?php
              $reqNbPub = "select count(*) nb from publications";
              $resNbPub = DB::select($reqNbPub);
            ?>
            <span data-purecounter-start="0" data-purecounter-end="{{ $resNbPub[0]->nb }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Publications</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <?php
              $reqNbAct = "select count(*) nb from activites";
              $resNbAct = DB::select($reqNbAct);
            ?>
            <span data-purecounter-start="0" data-purecounter-end="{{ $resNbAct[0]->nb }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Activités</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-right">
            <div class="content">
              <h3>Pourquoi choisir Harvest comme reseau social?</h3>
              <p>
                Trouver un vulgarisateur agricole professionnel et expérimenté dans un domaine n'a jamais été aussi facile. En deux clics, vous pourrez trouver toutes les vulgarisateurs de votre choix avec des détails bien précis(description,localisation,...).
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">En voir plus <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Recherche personalisée</h4>
                    <p>effectuez une recherche rapide selon votre critère</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Geolocalisation</h4>
                    <p>Localisez facilement les vulgarisateurs en cas de besoin</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Discussion</h4>
                    <p>Discutez instantanément si vous avez besoin de quelques conseils et technique</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center" data-aos="zoom-in">
          <h3>Appel à l'action</h3>
          <p> Nous incitons tous les agriculteurs et vulgarisateurs agricoles à participer aux développement de l'agriculture en devenant membre de HARVEST</p>
          <a class="cta-btn" href="#">S'incrire</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Services Section ======= -->
   
   <!-- End Services Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <div class="section-title">
              <h2>Contact</h2>
              <p>Des conseils et critiques constructives de votre part serait un atout pour notre évolution.</p>
            </div>
          </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
           
            <div class="info mt-4">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>Andoharanofotsy - 101 Antananarivo - Madagascar</p>
            </div>
            <div class="row">
              <div class="col-lg-6 mt-4">
                <div class="info">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p><a href="mailto:tahiana.hajanirina@outlook.com">tahiana.hajanirina@outlook.com</a></p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="info w-100 mt-4">
                  <i class="bi bi-phone"></i>
                  <h4>Téléphone:</h4>
                  <p>+261 34 38 362 36</p>
                </div>
              </div>
            </div>

           
          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
         <strong><span>Harvest</span></strong>. Tous droits réservés
        </div>
        
      </div>
    
    </div>
  </footer><!-- End Footer -->



  <!-- Vendor JS Files -->
  <script src="{{asset('vendor/aos/aos.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('js/main2.js')}}"></script>

  

    <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'mg'}, 'google_translate_element');
    }
    </script>

    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>