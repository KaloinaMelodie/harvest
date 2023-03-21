<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="">
    <title></title>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

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

<script type="text/javascript">
function initialize() {
    

    var mapOptions = {
        center: new google.maps.LatLng(-18.986021, 47.532735),
        zoom: 12,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };
    var carte = new google.maps.Map(document.getElementById("carteId"),mapOptions);

        var location = new google.maps.LatLng(-18.986021, 47.532735);
            var marker = new google.maps.Marker({
            position: location,
            draggable: true,                
            map: carte
        }); 
   
                
   
}


google.maps.event.addDomListener(window, 'load', initialize);

</script>

</head>
<body>

    <div class="content">
   @if(isset($resultatRecherche))
        <div class="row" id="content-search">
            <div class="col-md-1">
                  <a href="retourVersAccueilAgriculteur"><span class="material-icons">arrow_back</span></a>
            </div>
            <div class="col-md-10" id="post">
                @foreach($resultatRecherche as $rr)
                    <div class="row" id="box-result">
                        <div class ="col-md-2" id="header-result">
                            <div class="avatar-result"><img src="{{asset('images/avatar.png')}}"></div>
                        </div>
                         <div class="col-md-6" id="info-result">          
                            <h5>{{$rr->nom.' '.$rr->prenom}}</h5>               
                            <p>{{$rr->nomDomaine}}</p> 
                        </div>
                        <div class="col-md-4" id="option">
                            <form action="toProfile" method="get">
                                <input type="hidden" name="idVulg" value="{{$rr->idVulgarisateur}}">
                                 <button class="btn btn-dark">Voir</button>
                            </form>
                           
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="col-md-1"></div>
        </div>

    @endif
    <!-- container -->
</div>

</body>
</html>