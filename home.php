<?php
	$page_name="home.php";
  require ('entete.php');
  //require('../database_auth.php');
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Se7en</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
   integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
   integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
   crossorigin=""></script>
    <link  href="css/hotel-datepicker.css" rel="stylesheet"><!-- Optional -->
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="js/carte.js"></script>
    <script src="js/fecha.js"></script>
    <script src="js/date.js"></script>
    <script src="js/hotel-datepicker.min.js"></script>
    
  </head>

  <div class="col-lg-12 col-md-12 col-sm-12">


    <div class="col-lg-4 col-md-4 col-sm-4" style="border: 1px solid white; height: 500px; margin-right: 20px;">


        
      
      <div class = "panel panel-primary">
        <div class = "panel-heading">
          <h3 class = "panel-title" style="text-align: center;">Réservez</h3>
        </div>
   
   
      </div>
      

          <div class="row">
            <div class="col-sm-12">
              <span class="glyphicon glyphicon-search" style="margin-top: 5px"></span>
              <input id="ville" type="text" class="form-control" placeholder="Où ?">
            </div>
          </div>

           <div class="row" style="margin-top: 30px;">  
               <div class="col-md-12">
                <span class="glyphicon glyphicon-calendar" style="margin-top: 5px"></span>
              
             <!-- <input type="email" class="form-control" id="inputEmail4" placeholder="Email"> -->
                <input class="form-control" id="arrivee" type="text" placeholder="Date">
              </div>
             
            </div>

            <div class="row" style="margin-top: 30px;">
              <div class="col-md-6">
                <span class="glyphicon glyphicon-user" style="margin-top: 5px"></span>  
                <input class="form-control" type="number" min="1" max="10" class="col-sm-12" placeholder="Voyageurs">
              </div>
            </div>  
              

          <div class="row" style="margin-top: 50px;">
            <div class="col-md-6 pull-right">    
              <button id="recherche" type="button" class="form-control btn btn-success">Rechercher</button>
            </div>  
          </div>


      


    </div>

    <div id="mapid" class='col-md-7 col-sm-7 col-lg-7 custom-popup' style="border: 1px solid black; height: 500px;"></div>


      
  </div>



  


  
</body>
</html>