<?php

//Login Database
$host = "127.0.0.1";
$database = "route planner";
$user = "root";
$password = "";
if($pMysqli = new mysqli('p:'.$host, $user, $password, $database)) {
  //echo "connected";
} else {
  echo "not connected";
}

//Umlaute ä,ö,ü
$pMysqli->query("SET NAMES 'utf8'");

//sitename
$sitename = "Routenplaner";

?>
 
