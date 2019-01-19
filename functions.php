<?php

function getUser() {
  $user_id = $_GET["user_id"];
  if($user_id>0 && $user_id<3) {
    return $user_id;
  } else {
    echo "ERROR! Couldn't find User-ID!";
    return;
  }
  /*NOT WORKING YET
  if(($_GET["user_id"])>0) {
  return $user_id = $_GET["user_id"];
} else {
echo "ERROR! Couldn't find User-ID!";
return;
}*/

}

function formatDistance($distance) {
  if($distance>1000) {
    $distance = number_format($distance/1000, 1, ",", ".") . " km";
  } else {
    $distance = $distance . " m";
  }
  return $distance;
}

function formatAltitude($altitude) {
  $altitude = number_format($altitude, 0, "", ".") . " hm";
  return $altitude;
}

function onlyDate($date) {
  $date = date("Y-m-d", strtotime($date));
  return $date;
}

function formatDate($date) {
  $date = date("d.m.Y", strtotime($date));
  return $date;
}

function onlyTime($time) {
  $time = date("H:i:s", strtotime($time));
  return $time;
}

function formatTime($time) {
  $time = date("H:i", strtotime($time));
  return $time;
}

function getDuration($distance, $mph, $chargingtime) {
  $duration = $distance / $mph + $chargingtime;
  return $duration;
}

function formatDuration($duration) {
  if ($duration > 1) {
    $duration = gmdate("H", floor($duration * 3600)) . " h " . gmdate("i", floor($duration * 3600)) . " min";
  } else {
    $duration = gmdate("i", floor($duration * 3600)) . " min";
  }
  //$duration = gmdate("H.i", floor($duration * 3600)) . " h";
  return $duration;
}

?>
