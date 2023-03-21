<?php
   use Illuminate\Support\Facades\DB;
   $reqVulg = "SELECT COUNT(*) AS nb FROM vulgarisateurs";
   $reqAgr = "SELECT COUNT(*) AS nb FROM agriculteurs";
   $nbVulg = DB::select($reqVulg);
   $nbVulg = $nbVulg[0]->nb;
   $nbAgr = DB::select($reqAgr);
   $nbAgr = $nbAgr[0]->nb;
?>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/charts/circle-count01.css')}}">

<div class="circle-counter">
   <div class="header-counter">Vulgarisateurs</div>
   <div class="number-counter">
     <span id="counter_text">{{ $nbVulg }}</span>
  </div>
 </div>

 <div class="circle-counter">
    <div class="header-counter">Agriculteurs</div>
    <div class="number-counter">
      <span id="counter_text02">{{ $nbAgr }}</span>
   </div>
  </div>

  <script src="{{ asset('js/charts/circle-count01.js') }}"></script>