<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>AirLocation</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="jquery/jquery-3.3.1.js"></script>  
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <link href="css/authentification.css" rel="stylesheet">
  <link href="css/mon_compte.css" rel="stylesheet">

  <script src="js/redirection_pages_functions.js"></script>
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">AirLocation</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <?php 
        if($_SESSION['connecte'] == true){
          echo "<li><a href='#' id='connected_as'><span class='glyphicon glyphicon-education glyphicon_header'> </span> Connecté en tant qu'invité</a></li>";
          echo '<li><a href="deconnexion.php"><span class="glyphicon glyphicon-off glyphicon_header"> </span> Déconnexion </a></li>';
        }
        else{
          echo '<li><a href="inscription.php"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>
                <li><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>';
        }
      ?>
    
    </ul>
  </div>
</nav>
