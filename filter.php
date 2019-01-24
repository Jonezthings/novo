<!-- <p>
  <b>
    filter
  </b>
</p> -->


<!-- LOCATIONS -->
<!-- A -->
<div class="row">
  <div class="col-12">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">A</span>
      </div>
      <input type="text" class="form-control" placeholder="Aktueller Standort" aria-label="A">
    </div>
  </div>
</div>
<!-- B -->
<div class="row">
  <div class="col-12">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">B</span>
      </div>
      <input type="text" class="form-control" placeholder="Zielort auswählen" aria-label="B">
    </div>
  </div>
</div>


<!-- FILTERS -->
<div class="row">
  <!-- DISTANCE -->
  <div class="col-4">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Entfernung" aria-label="Distance">
      <div class="input-group-prepend">
        <span class="input-group-text">km</span>
      </div>
    </div>
    <?php $filterDistance = 10000; ?>
  </div>
  <!-- ALTITUDE -->
  <div class="col-4">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Höhenmeter" aria-label="Altitude">
      <div class="input-group-prepend">
        <span class="input-group-text">hm</span>
      </div>
    </div>
    <?php $filterAltitude = 300; ?>
  </div>

  <!-- DURATION -->
  <div class="col-4">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Dauer" aria-label="Duration">
      <div class="input-group-prepend">
        <span class="input-group-text">h</span>
      </div>
    </div>
    <?php $filterDuration = 1; ?>
  </div>
</div>


<?php
/*DURATION = distance/mph + chargingtime*/
//Meters per hour
$kmph = 15;
$mph = $kmph * 1000;
//Time for charging
$chargingtime = 0.42;

/*FILTER NICHT SICHTBAR*/
$reachDistance = 40; //?
$reachDuration = 4; //?
?>
