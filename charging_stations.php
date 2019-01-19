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
  ?>
  charging_station id: <?= $row["id"] ?><br>
  title: <?= $row["title"] ?><br>
  latitude: <?= $row["latitude"] ?><br>
  longitude: <?= $row["longitude"] ?><br>
  slots: <?= $row["slots"] ?><br>
  <br>

  <script>
  map.on('load', function() {
    map.addSource("charging_station_id", {
      type: "geojson",
      data: {
        type: 'Point',
        coordinates: [<?= $row["longitude"] ?>, <?= $row["latitude"] ?>],
      },
    });
    map.addLayer({
      "id": "charging_station_id",
      "type": "circle",
      "source": "charging_station_id",
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
