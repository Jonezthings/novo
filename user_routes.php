<!-- <p>
<b>
user_routes
</b>
</p> -->


<div class="row">
  <?php
  $selected_user_routes = $_GET["user_routes"];

  switch ($selected_user_routes) {
    // <!-- VORGESCHLAGENE ROUTEN -->
    case 1:
    include("suggested_routes.php");
    break;
    // <!-- GESPEICHERTE ROUTEN -->
    case 2:
    include("saved_routes.php");
    break;
    // <!-- LETZTE ROUTEN -->
    case 3:
    include("latest_routes.php");
    break;
    //DEFUALT
    default:
    break;
  }
?>
</div>


<div class="row">
  <div class="col-4">
    <a class="btn" id="user_routes-button" href="index.php?user_id=1&user_routes=1" role="button">1</a>
  </div>
  <div class="col-4">
    <a class="btn" id="user_routes-button" href="index.php?user_id=1&user_routes=2" role="button">2</a>
  </div>
  <div class="col-4">
    <a class="btn" id="user_routes-button" href="index.php?user_id=1&user_routes=3" role="button">3</a>
  </div>
</div>
