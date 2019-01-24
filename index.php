<?php
include("config.php");
include("functions.php");
include("update.php");
//session_start();
//echo session_id();
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Page Title -->
  <title><?= $sitename ?></title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS einbinden-->
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Eigene CSS einbinden-->
  <link href="css/own-css.css" rel="stylesheet">

  <!-- Mapbox einbinden-->
  <script src='https://api.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v0.51.0/mapbox-gl.css' rel='stylesheet' />
  <style>
  body { margin:0; padding:0; }
  #map { position:absolute; top:0; bottom:0; width:100%; }
  </style>
</head>


<body>
  <?php include("map.php") ?>

  <!-- jQuery (notwendig für Bootstrap’s JavaScript Plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
  <!-- Alle Plugins als verkleinerte Version laden -->
  <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>
