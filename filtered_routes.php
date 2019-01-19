<p>
  <b>
    filtered_routes
  </b>
</p>


<?php
$query = "
SELECT routes.*,
users.username,
route_type.type,
coordinates.latitude, coordinates.longitude, coordinates.power
FROM routes
LEFT JOIN users ON routes.user_id = users.id
LEFT JOIN route_type ON routes.route_type_id = route_type.id
LEFT JOIN coordinates  ON routes.id = coordinates.route_id
WHERE routes.distance > " . ($filterDistance-500) . "
AND routes.distance < " . ($filterDistance+500) . "
AND routes.altitude > " . ($filterAltitude-100) . "
AND routes.altitude < " . ($filterAltitude+100) . "
AND (routes.distance / " . $mph . " + " . $chargingtime . " ) > " . ($filterDuration-1) . "
AND (routes.distance / " . $mph . " + " . $chargingtime . " ) < " . ($filterDuration+1) . "
ORDER BY routes.id ASC
";

//AND (routes.distance / " . $mph . " + " . $chargingtime . " ) > " . ($filterDuration-1) . "
//AND (routes.distance / " . $mph . " + " . $chargingtime . " ) < " . ($filterDuration+1) . "

$result = $pMysqli->query($query);
while ($row = mysqli_fetch_assoc($result)) {

  $routeCoord[0][0] = $row['id'];
  $routeCoord[0][1] .= '['.$row['longitude'].','.$row["latitude"].'],';

  ?>

  routes id: <?= $row["id"] ?> <br>
  title: <?= $row["title"] ?> <br>
  date: <?= formatDate($row["date"]) ?> <br>
  distance: <?= formatDistance($row["distance"]) ?> <br>
  altitude: <?= formatAltitude($row["altitude"]) ?> <br>
  duration: <?= formatDuration(getDuration($row["distance"], $mph, $chargingtime)) ?> <br>
  user_id: <?= $row["user_id"] ?> <br>
  username: <?= $row["username"] ?> <br>
  type: <?= $row["type"] ?> <br>
  route_type_id: <?= $row["route_type_id"] ?> <br>
  latitude: <?= $row["latitude"] ?><br>
  longitude: <?= $row["longitude"] ?><br>
  power: <?= $row["power"] ?><br>
  <br>

  <script>
  var route = [
    [9.788725, 48.800585],
    [9.888721, 48.700585]
  ];
  </script>

  <?php
}
// rtrim($routeCoord[0][1],',');
// echo(rtrim($routeCoord[0][1],','));
// $route = rtrim($routeCoord[0][1],',');
?>


<script>
map.on('load', function () {
  map.addLayer({
    "id": "route_id",
    //"id": "route",
    "type": "line",
    "source": {
      "type": "geojson",
      "data": {
        "type": "Feature",
        "properties": {},
        "geometry": {
          "type": "LineString",
          "coordinates": route
        }
      }
    },
    "layout": {
      "line-join": "round",
      "line-cap": "round"
    },
    "paint": {
      "line-color": "#888",
      "line-width": 20
    }
  });
});
</script>';
