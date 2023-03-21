 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/harvest.ico') }}" /><link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/harvest.ico') }}" />


     <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script>
        function export_to_pdf() {
    html2canvas(document.getElementById("carteId"), {
        useCORS: true,
        onrendered: function(canvas) {
            var img =canvas.toDataURL("image/jpeg,1.0");
            var pdf = new jsPDF();

            pdf.addImage(img, 'JPEG', 0, 50, 200, 100);
            pdf.save('a4.pdf')
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

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false">
 
</script>
<style type="text/css">
html { height: 100% }
body { height: 100%; margin: 0; padding: 0 }
      #carteId{ height: 500px ;width:100%;border:5px solid #26272B ;  box-shadow: 0px 0px 20px -5px black;}
</style>

<script type="text/javascript">
function initialize() {
    <?php
        if (isset($coord)) {
            if (isset($coord[0])) {
    ?>
                var lng = <?php echo json_encode($coord[0]->longitude,JSON_NUMERIC_CHECK) ?>;    
                var lat = <?php echo json_encode($coord[0]->latitude,JSON_NUMERIC_CHECK) ?>;
                var mapOptions = {
                center: new google.maps.LatLng(lat,lng),
                zoom: 12,
                mapTypeId:google.maps.MapTypeId.ROADMAP
                };
                var carte = new google.maps.Map(document.getElementById("carteId"),mapOptions);

                var location = new google.maps.LatLng(lat, lng);
                    var marker = new google.maps.Marker({
                    position: location,
                    draggable: false,                
                    map: carte
                }); 
    <?php
            
            }
        }
    ?>
   
                
   
}


google.maps.event.addDomListener(window, 'load', initialize);

</script>

 <body>
 
<!--PROFIL-->
       
        
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="{{asset('images/'.$vulg[0]->pdp.'.jpg')}}" alt=""/>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {{$vulg[0]->nom}}
                                    </h5>
                                    <h6>
                                        {{$vulg[0]->prenom}}
                                    </h6>
                                   
                          
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-md-4">
                       
                    </div>
                    <div class="col-md-8">
                      
                          
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Identifiant</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$vulg[0]->idVulgarisateur}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nom complet</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$vulg[0]->nom.$vulg[0]->prenom}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$vulg[0]->login}}</p>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <label>Adresse</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$vulg[0]->adresse}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Contact</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$vulg[0]->contact}}</p>
                                            </div>
                                            <form action="profilVersMessage" method="get">
                                                <input type="hidden" name="idVulgarisateur" value="{{$vulg[0]->idVulgarisateur}}">
                                                <button class="btn btn-success">Discutez</button>
                                                 <button class="btn btn-danger" style="margin: 50px;" onclick="export_to_pdf()">Imprimer la carte</button>
                                            </form>
                                            
                                        </div>
                                        <div class="tab-pane fade show active" id="localisation" role="tabpanel" aria-labelledby="localisation-tab">
                                            <div id="carteId" style="margin-top: 50px"></div>

                                         </div>
                                       
                          
                          <!--LOCALISATION-->
                          

                      
                    </div>
                </div>
          

        

  </body>
</html>