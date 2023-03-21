<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Harvest | Équipe</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('images/harvest.ico') }}" /><link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/harvest.ico') }}" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('vip/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('vip/dist/css/adminlte.min.css') }}">

  
  <link rel="stylesheet" type="text/css" href="{{ asset('vip/styleVIP.css') }}">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('VIP/header')

    @include('VIP/sidebar')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  {{-- <img src="{{ asset('images/logo_harvest2.png') }}" height="100px"> --}}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Tahiana Andriambahoaka</b></h2>
                      <p class="text-muted text-sm"><b>À Propos: </b> Concepteur </p>
                      <p class="text-muted text-sm"><b>Bio: </b> L'organisation est la méthode efficace vers le succès. </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> <b>Mail:</b> <a href="mailto:tahiana.hajanirina@outlook.com">tahiana.hajanirina@outlook.com</a></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <b>Téléphone:</b> + 261 34 38 362 36</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{asset('img/team/tahiana.jpg')}}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  {{-- <img src="{{ asset('images/logo_harvest2.png') }}" height="100px"> --}}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Tsantaniaina Rakotonjanahary</b></h2>
                      <p class="text-muted text-sm"><b>À Propos: </b> Développeur et Mathématicien </p>
                      <p class="text-muted text-sm"><b>Bio: </b>Résoudre un problème a toujours été mon objectif mais se communiquer c'est la base. </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span><b>Mail:</b> <a href="mailto:tsantaniainarakotonjanahary@gmail.com">tsantaniainarakotonjanahary@gmail.com</a></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <b>Téléphone:</b> + 261 34 80 701 20</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{asset('img/team/tsanta.jpg')}}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  {{-- <img src="{{ asset('images/logo_harvest2.png') }}" height="100px"> --}}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Maminiaina Fabruce</b></h2>
                      <p class="text-muted text-sm"><b>À Propos: </b> UI/UX Designer - Développeur </p>
                      <p class="text-muted text-sm"><b>Bio: </b> Je veux acquérir autant d'expérience dans mon carrière professionnelle.N'avoir peur de l'echec et avoir un objectif est la clé vers la réussite.L'obsession pour le travail est l'essence mais le talent n'est que le surplus. </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span><b>Mail:</b> <a href="mailto:mami2fabruce@gmail.com">mami2fabruce@gmail.com</a></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <b>Téléphone:</b> + 261 32 81 879 85</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{asset('img/team/fabruce.jpg')}}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  {{-- Digital Strategist --}}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Anthony Andriantsilavina</b></h2>
                      <p class="text-muted text-sm"><b>À Propos: </b> Développeur </p>
                      <p class="text-muted text-sm"><b>Bio: </b> Rendre les choses faciles et simples est le but. </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span><b>Mail:</b> <a href="mailto:andriantsilavinaanthony@gmail.com">andriantsilavinaanthony@gmail.com</a></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <b>Téléphone:</b> + 261 34 75 252 46</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{asset('img/team/Tony.jpg')}}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  {{-- Digital Strategist --}}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Hery Stéphane</b></h2>
                      <p class="text-muted text-sm"><b>À Propos: </b> Designer & Développeur </p>
                      <p class="text-muted text-sm"><b>Bio: </b> Ajouter du couleur peut changer toute sa valeur.Tout est question de perception... </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span><b>Mail:</b> <a href="mailto:hery.stephane.rarivoson@gmail.com">hery.stephane.rarivoson@gmail.com</a></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <b>Téléphone:</b> + 261 34 85 780 40</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{asset('img/team/hery.jpg')}}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('vip/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('vip/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('vip/plugins/chart.js/Chart.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('vip/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('vip/dist/js/demo.js') }}"></script>

</body>
</html>
