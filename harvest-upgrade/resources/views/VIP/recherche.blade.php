<?php
  use Illuminate\Support\Facades\DB;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Harvest | Recherche</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('images/harvest.ico') }}" /><link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/harvest.ico') }}" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('vip/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('vip/dist/css/adminlte.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('vip/plugins/select2/css/select2.min.cs') }}s">

  
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
    <section class="content-header">
      <div class="container-fluid">
        <h2 class="text-center display-4">Qui voulez-vous rechercher ?</h2>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="/vip/recherche" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Profil:</label>
                                    <select name="profil" id="profil" onchange="change()" class="select2" style="width: 100%;">
                                        <option value="Vulgarisateur" selected>Vulgarisateur</option>
                                        <option value="Agriculteur">Agriculteur</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Domaine:</label>
                                    <?php
                                        $resListeDomaine = DB::select("select * from domaines");
                                    ?>
                                    <select name="domaine" id="domaine" class="select2" style="width: 100%;">
                                        <option value="" selected></option>
                                        <?php
                                            foreach ($resListeDomaine as $ld) {
                                        ?>
                                            <option value="{{ $ld->nomDomaine }}">{{ $ld->nomDomaine }}</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input name="nom" id="nom" type="search" class="form-control form-control-lg" placeholder="Nom d'agriculteur ou de vulgarisateur">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


















 <!-- Default box -->
 <?php if (isset($data)) { ?>
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row">
                <?php foreach($data as $data) { ?>
                    <?php if(isset($data->idVulgarisateur)) { ?>
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                {{-- <img src="{{ asset('images/logo_harvest2.png') }}" height="100px"> --}}
                                </div>
                                <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                    <h2 class="lead"><b>{{ $data->prenom }} {{ $data->nom }}</b></h2>
                                    <p class="text-muted text-sm"><b>À Propos: </b> Vulgarisateur </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> <b>Mail:</b> <a href="mailto:{{ $data->login }}">{{ $data->login }}</a></li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <b>Téléphone:</b> {{ $data->contact }}</li>
                                    </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                    <?php $img = sprintf("images/%s", $data->pdp) ?>
                                    <img src="{{asset($img)}}" alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                {{-- <img src="{{ asset('images/logo_harvest2.png') }}" height="100px"> --}}
                                </div>
                                <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                    <h2 class="lead"><b>{{ $data->prenom }} {{ $data->nom }}</b></h2>
                                    <p class="text-muted text-sm"><b>À Propos: </b> Agriculteur </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> <b>Mail:</b> <a href="mailto:{{ $data->login }}">{{ $data->login }}</a></li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <b>Téléphone:</b> {{ $data->contact }}</li>
                                    </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <?php $img = sprintf("images/%s", $data->pdp) ?>
                                    <img src="{{asset($img)}}" alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
<?php } ?>















        </div>
    </section>
  </div>

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
<!-- Select2 -->
<script src="{{ asset('vip/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function () {
      $('.select2').select2()
    });
</script>
<script>

    function change() {
        if (document.getElementById('profil').value == "Vulgarisateur") {
            $('#domaine').prop('disabled', false);
        } else {
            $('#domaine').prop('disabled', true);
        }
    }

    function Fichier(fichier) {
        if(window.XMLHttpRequest) obj = new XMLHttpRequest(); //Pour Firefox, Opera,...
        else if(window.ActiveXObject) obj = new ActiveXObject("Microsoft.XMLHTTP"); //Pour Internet Explorer 
        else return(false);
        if (obj.overrideMimeType) obj.overrideMimeType("text/xml"); //Évite un bug de Safari
        obj.open("GET", fichier, false);
        obj.send(null);
        if(obj.readyState == 4) return(obj.responseText);
        else return(false);
    }

</script>

</body>
</html>
