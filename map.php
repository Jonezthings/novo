<div style="height: 100%">
  <!-- MAP -->
  <div id='map'>
  </div>
  <!-- CONTENT -->
  <div class="container-fluid bg-white" id="container-map-top">
    <!-- FILTERS -->
    <?php include("filter.php") ?>
  </div>
  <!-- USER ROUTES -->
  <div class="container-fluid bg-white" id="container-map-bottom">
    <?php include("user_routes.php") ?>
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
  // style: 'mapbox://styles/mapbox/navigation-guidance-day-v4'
});
</script>




<!-- CHARGING_STATIONS -->
<?php
include("charging_stations.php")
?>
<!-- GEFILTERTE ROUTEN -->
<?php
include("filtered_routes.php")
?>
