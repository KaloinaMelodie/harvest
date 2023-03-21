<?php 
	use App\Models\Vulgarisateurs;
	$listeEmplacement = BD::select("select * from localisation_vulgarisateurs");
	$valiny = array();
	$i=0;
	foreach($listeEmplacement as $ls){
		$valiny[$i]['lng'] = $ls->longitude;
		$valiny[$i]['lat'] = $ls->latitude;
		$i++;
	} 
?>