<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<style type="text/css">
	html { height: 100% }
	body { height: 100%; margin: 0; padding: 0 }

	/* #carteId {
		height: 100%;
		width: 50%;
	} */
</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<?php 
	use Illuminate\Support\Facades\DB;
	function getEmplacement($idDomaine) {
		$reqEmplacement =	"select max(lv.idLocalisation_vulgarisateur), v.idVulgarisateur, lv.longitude, lv.latitude, v.nom, v.prenom, v.contact, d.nomDomaine ".
							"from localisation_vulgarisateurs lv ".
							"join relVulgarisateur_domaines rvd on rvd.idVulgarisateur=lv.idVulgarisateur ".
							"join domaines d on d.idDomaine=rvd.idDomaine ".
							"join vulgarisateurs v on v.idVulgarisateur=lv.idVulgarisateur ".
							"group by v.idVulgarisateur, lv.longitude, lv.latitude, v.nom, v.prenom, v.contact, d.nomDomaine";
		$valiny = array();
		$listeEmplacement = null;
		if ($idDomaine != 0) {
			$reqEmplacement =	"select max(lv.idLocalisation_vulgarisateur), v.idVulgarisateur, lv.longitude, lv.latitude, v.nom, v.prenom, v.contact, d.nomDomaine ".
								"from localisation_vulgarisateurs lv ".
								"join relVulgarisateur_domaines rvd on rvd.idVulgarisateur=lv.idVulgarisateur ".
								"join domaines d on d.idDomaine=rvd.idDomaine ".
								"join vulgarisateurs v on v.idVulgarisateur=lv.idVulgarisateur ".
								"where d.idDomaine = ".$idDomaine.
								" group by v.idVulgarisateur, lv.longitude, lv.latitude, v.nom, v.prenom, v.contact, d.nomDomaine";
		}
		$listeEmplacement = DB::select($reqEmplacement);
		$i=0;
		foreach($listeEmplacement as $ls) {
			$valiny[$i]['lng'] = $ls->longitude;
			$valiny[$i]['lat'] = $ls->latitude;
			$valiny[$i]['nom'] = $ls->nom;
			$valiny[$i]['prenom'] = $ls->prenom;
			$valiny[$i]['contact'] = $ls->contact;
			$valiny[$i]['domaine'] = $ls->nomDomaine;
			$i++;
		}
		return $valiny;
	}
	
	$listeDomaine = DB::select("select * from domaines");
	
?>
<script type="text/javascript">
	function initialize() {
		// var data=new FormData();
		// var req=new XMLHttpRequest();
		// req.onreadystatechange=function(){

		// 	if(req.readyState===4)
		// 	{
		// 		if(req.status===2000)
		// 		{
		// 			alert(req);
		// 		}
		// 	}
		// }
		// req.open('POST','carte.blade.php',true);
		// req.send(data);

		var mapOptions = {
			center: new google.maps.LatLng(-18.986021, 47.532735),
			zoom: 6,
			mapTypeId:google.maps.MapTypeId.ROADMAP
		};

		var carte = new google.maps.Map(document.getElementById("carteId"),mapOptions);

		<?php
			$idDomaine = 0;
			if (isset($_GET['idDomaine'])) {
				if ($_GET['idDomaine'] <= count($listeDomaine)) {
					$idDomaine = $_GET['idDomaine'];
				}
			}
		?>
		var liste = <?php echo json_encode(getEmplacement($idDomaine),JSON_NUMERIC_CHECK) ?>;

		for(var i=0;i<liste.length;i++) {
			var location = new google.maps.LatLng(liste[i]['lat'], liste[i]['lng']);
			var infoWindow = new google.maps.InfoWindow();
			var marker = new google.maps.Marker({
				icon: "<?php echo asset('images/marker.ico') ?> ",
				position: location,
				draggable: false,				
				map: carte
			});
			(function (i) {
				google.maps.event.addListener(marker, "click", function () {
					// var villes = locations[i];
					infoWindow.close();
					var content =
						"<div id='boxcontent' style='font-family:Calibri'>"+
							"<strong style='color:green;font-size:16px'>" + liste[i]['nom'] +" "+ liste[i]['prenom'] + "<br></strong>"+
							"<span style='font-size:12px;color:#333'><b>Domaine:</b> "+ liste[i]['domaine'] +"</span><br>"+
							"<span style='font-size:12px;color:#333'><b>Contact:</b> "+ liste[i]['contact'] +"</span>"+
						"</div>";
					infoWindow.setContent(content);
					infoWindow.open(carte, this);
				});
			})(i);
		}
					
		var sel = document.getElementById("dom");
		sel.addEventListener('change',function(){
			var id=document.getElementById("dom").value;
			console.log(id);
			window.location.href = "?idDomaine=" + id;
			data = new FormData();
			data.append('ide',id);
		});

	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">

			<div class="col-md-6">
				<div id="carteId" style="min-height:600px; width: 107%; margin-left: -3.5%"></div>
			</div>

			<div class="col-md-6" style="background-color: rgb(224, 247, 240)">

				<div class="row g-3 align-items-center">
					<div class="col-auto">
						<label for="inputPassword6" class="col-form-label">Choisissez un domaine à localiser</label>
					</div>
					<div class="col-auto">
						<select id="dom" class="form-select form-select-sm" aria-label=".form-select-sm example">
							<option value="0">Nom de domaine</option>
							<option value="0">Tous</option>
							<?php foreach ($listeDomaine as $ld) { ?>
								<option value="{{ $ld->idDomaine }}">{{ $ld->nomDomaine }}</option>
							<?php } ?>
						</select>
					</div>
				</div>
				
			</div>

		</div>
	</div>
	{{-- <div id="carteId"style="height:100%;width:50%"/> --}}
</body>
</html>
