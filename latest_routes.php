<!-- <p>
  <b>
    latest_routes
  </b>
</p> -->


<?php
$query = "
SELECT routes.*,
users.username,
route_type.type
FROM routes
LEFT JOIN users ON routes.user_id=users.id
LEFT JOIN route_type ON routes.route_type_id=route_type.id
WHERE routes.user_id= '" . getUser() . "'
ORDER BY routes.id DESC
";

$result = $pMysqli->query($query);
while ($row = mysqli_fetch_assoc($result)) {
  ?>
  <div class="col-3">
    <div class="card">
      <img src="https://via.placeholder.com/150x100" class="card-img-top" alt="Routeimage">
      <div class="card-body">
        <p class="card-text"><?= formatDistance($row["distance"]) ?></p>
        <p class="card-text"><?= formatAltitude($row["altitude"]) ?></p>
        <p class="card-text"><?= formatDuration(getDuration($row["distance"], $mph, $chargingtime)) ?></p>
      </div>
    </div>
  </div>


  <!-- latest routes id: <?= $row["id"] ?> <br>
  title: <?= $row["title"] ?> <br>
  date: <?= formatDate($row["date"]) ?> <br>
  distance: <?= formatDistance($row["distance"]) ?> <br>
  altitude: <?= formatAltitude($row["altitude"]) ?> <br>
  duration: <?= formatDuration(getDuration($row["distance"], $mph, $chargingtime)) ?> <br>
  user_id: <?= $row["user_id"] ?> <br>
  username: <?= $row["username"] ?> <br>
  type: <?= $row["type"] ?> <br>
  route_type_id: <?= $row["route_type_id"] ?> <br>
  <br> -->


<?php } ?>
