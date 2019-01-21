<p>
  <b>
    suggested_routes
  </b>
</p>


<?php
$query = "
SELECT suggested_routes.*,
routes.title, routes.date, routes.distance, routes.altitude, routes.route_type_id,
users.username,
route_type.type,
coordinates.latitude, coordinates.longitude, coordinates.power
FROM suggested_routes suggested_routes
LEFT JOIN routes ON suggested_routes.route_id = routes.id
LEFT JOIN users ON suggested_routes.user_id = users.id
LEFT JOIN route_type ON routes.route_type_id = route_type.id
LEFT JOIN coordinates ON routes.id = coordinates.route_id
WHERE suggested_routes.user_id = '" . getUser() . "'
ORDER BY suggested_routes.id DESC
";

$result = $pMysqli->query($query);
while ($row = mysqli_fetch_assoc($result)) {
  //show selected route on map
  ?>


  <!-- suggested_routes id: <?= $row["id"] ?> <br>
  user_id: <?= $row["user_id"] ?> <br>
  route_id: <?= $row["route_id"] ?> <br>
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
