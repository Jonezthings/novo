<!-- MAPBOX DIV -->
<div class="row">
  <div class="col-12" style="height: 50%">
    <div id='map'></div>
  </div>
</div>


<!-- MAPBOX DIV SETTINGS -->
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoiYnJ1Y2tiYXVlcmoiLCJhIjoiY2pwdmoxaWIxMHMyZzQxcGF2NmRydHBxeCJ9.mLg91Zz-JpAcsvoEwAgwxw';
var map = new mapboxgl.Map({
  container: 'map',
  //google maps:    latitude, longitude
  //mapbox:         longitude, latitude
  //Start IoT Lab:  9.788725, 48.800585
  center:[9.788725, 48.800585],
  zoom: 13,
  style: 'mapbox://styles/mapbox/streets-v10'
});
</script>


<!-- CONTENT -->
<div class="row">
  <!-- FILTERS -->
  <div class="col-12">
    <?php
    include("filter.php")
    ?>
  </div>
</div>

<!-- CHARGING_STATIONS -->
<?php
include("charging_stations.php")
?>
<!-- GEFILTERTE ROUTEN -->
<?php
include("filtered_routes.php")
?>

<!-- VORGESCHLAGENE ROUTEN -->
<div class="row">
  <div class="col-12">
    <?php
    include("suggested_routes.php")
    ?>
    <!-- GESPEICHERTE ROUTEN -->
    <?php
    include("saved_routes.php")
    ?>
    <!-- LETZTE ROUTEN -->
    <?php
    include("latest_routes.php")
    ?>
  </div>
</div>
