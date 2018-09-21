<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AirLocation</title>

  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
  
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
   integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
   crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
   integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
   crossorigin=""></script>

  <link  href="css/hotel-datepicker.css" rel="stylesheet">

  
  <script src="jquery/jquery-3.3.1.js"></script>  

  <script src="bootstrap/js/bootstrap.min.js"></script>

  <script src="js/carte.js"></script>
  <script src="js/fecha.js"></script>
  <script src="js/date.js"></script>
  <script src="js/hotel-datepicker.min.js"></script>

  <link href="css/authentification.css" rel="stylesheet">
  <link href="css/mon_compte.css" rel="stylesheet">
  <link href="css/espace_proprio.css" rel="stylesheet">

  <script src="js/redirection_pages_functions.js"></script>
  <script src="js/espace_proprio.js"></script>
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">AirLocation</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <?php 
        if(@$_SESSION['connecte'] == true && $page_name !== "redirection_connexion.php" && $page_name !== "redirection_inscription.php" && $page_name !== "deconnexion.php"){
          echo "<li><a href='mon_compte.php' id='espace_perso'> Espace Perso </a></li>";
          echo "<li><a href='#' id='connected_as'><span class='glyphicon glyphicon-education glyphicon_header'> </span> Connecté en tant que " . $_SESSION['login'] . "</a></li>";
          echo '<li><a href="deconnexion.php"><span class="glyphicon glyphicon-off glyphicon_header"> </span> Déconnexion </a></li>';
        }
        else if ($page_name !== "redirection_connexion.php" && $page_name !== "redirection_inscription.php"  && $page_name !== "deconnexion.php"){
          if($page_name !== "inscription.php" && @$_SESSION['connecte'] != true)
            echo '<li><a href="inscription.php"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>';
          if($page_name !== "connexion.php" && @$_SESSION['connecte'] != true)
            echo '<li><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>';
        }
      ?>
    </ul>
  </div>
</nav>
