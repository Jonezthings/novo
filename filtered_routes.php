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

$i = 0;
$lastId = -1;

$result = $pMysqli->query($query);
while ($row = mysqli_fetch_assoc($result)) {
  if ($row['id'] != $lastId && $lastId != -1){
    $i++;
  }
  $route_coord[$i][0] = $row['id'];
  $route_coord[$i][1] .= '['.$row['longitude'].','.$row["latitude"].'],';

  $lastId = $row['id'];
  ?>


  <!-- routes id: <?= $row["id"] ?> <br>
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
  <br> -->


<?php } ?>


<?php foreach ($route_coord as $route): ?>
  <script>
  map.on('load', function () {
    map.addLayer({
      "id": "route_<?= $route[0] ?>",
      "type": "line",
      "source": {
        "type": "geojson",
        "data": {
          "type": "Feature",
          "properties": {},
          "geometry": {
            "type": "LineString",
            "coordinates": [<?= rtrim($route[1],',') ?>]
          }
        }
      },
      "layout": {
        "line-join": "round",
        "line-cap": "round"
      },
      "paint": {
        "line-color": "#888",
        "line-width": 4
      }
    });
  });
</script>

<?php endforeach; ?>
