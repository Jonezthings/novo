<p>
  <b>
    charging_stations
  </b>
</p>


<?php
$query = "
SELECT charging_stations.*
FROM charging_stations
ORDER BY id ASC
";

$result = $pMysqli->query($query);
while ($row = mysqli_fetch_assoc($result)) {
  $charging_station_coord[$row['id']] = '['.$row['longitude'].','.$row["latitude"].']';
  echo($charging_station_coord[$row['id']]);


  ?>
  <!-- charging_station id: <?= $row["id"] ?><br>
  title: <?= $row["title"] ?><br>
  latitude: <?= $row["latitude"] ?><br>
  longitude: <?= $row["longitude"] ?><br>
  slots: <?= $row["slots"] ?><br>
  <br> -->

  <script>
  map.on('load', function() {
    map.addSource(<?= $row['id'] ?>, {
      type: "geojson",
      data: {
        type: 'Point',
        coordinates: <?= $charging_station_coord[$row['id']] ?>,
      },
    });
    map.addLayer({
      "id": "<?= $row['id'] ?>",
      "type": "circle",
      "source": "<?= $row['id'] ?>",
      "paint": {
        "circle-color": "#a3a",
        "circle-radius": 15,
      }
    });
  });
</script>

<?php
}
?>
