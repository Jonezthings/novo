<!-- <p>
  <b>
    update Database
  </b>
</p> -->


<?php
/*UPDATE ROUTES*/
/*TITLE, USER_ID, (ROUTE_TYPE_ID oder bei (DISTANCE, ALTITUDE)?)*/
$title = "'Routetitle'";
$user_id = 0;
$route_type_id = 0;
$distance = 0;
$altitude = 0;

/*UPDATE ROUTES*/
/*DISTANCE, ALTITUDE*/
$query = "
SELECT *
FROM coordinates
WHERE route_id NOT IN (SELECT id FROM routes)
ORDER BY id ASC
";

$result = $pMysqli->query($query);
while ($row = mysqli_fetch_assoc($result)) {
  //$distance = 0;
  //$row["latitude"];
  //$row["longitude"];
  //$altitude = 0;
  //$row["altitude"];
  ?>
  <li class="list-group-item">
    <p>
      id: <?= $row["id"] ?><br>
      route_id: <?= $row["route_id"] ?><br>
      datetime: <?= $row["datetime"] ?><br>
      latitude: <?= $row["latitude"] ?><br>
      longitude: <?= $row["longitude"] ?><br>
      altitude: <?= $row["altitude"] ?><br>
      power: <?= $row["power"] ?><br>
    </p>
  </li>
  <?php
}


/*UPDATE ROUTES*/
/*ID, DATE*/
$query = "
SELECT route_id, datetime
FROM coordinates
WHERE route_id NOT IN (SELECT id FROM routes)
ORDER BY id ASC
LIMIT 1
";

$result = $pMysqli->query($query);
while ($row = mysqli_fetch_assoc($result)) {
  $id = $row["route_id"];
  $date = onlyDate($row["datetime"]);
  ?>
  <li class="list-group-item">
    <p>
      date: <?= formatDate(onlyDate($row["datetime"])) ?>
    </p>
  </li>
  <?php
}


/*UPDATE ROUTES*/
/*CREATE ROUTE*/
$query = "
SELECT route_id, datetime
FROM coordinates
WHERE route_id NOT IN (SELECT id FROM routes)
ORDER BY id ASC
LIMIT 1
";

$result = $pMysqli->query($query);
while ($row = mysqli_fetch_assoc($result)) {
  $insert = "
  INSERT INTO routes (id,user_id,title,date,distance,altitude,route_type_id)
  VALUES (" . $id . "," . $user_id . "," . $title . ",'" . $date . "'," . $distance . "," . $altitude . "," . $route_type_id . ")
  ";
  $pMysqli->query($insert) or die("<br><br>" . mysqli_error($pMysqli));
}
?>
