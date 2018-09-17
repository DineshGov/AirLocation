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
    <link  href="css/hotel-datepicker.css" rel="stylesheet"><!-- Optional -->
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="js/fecha.js"></script>
    <script src="js/date.js"></script>
    <script src="js/hotel-datepicker.min.js"></script>
    
  </head>

  <div class="col-lg-12 col-md-12 col-sm-12">

    <div class="col-lg-4 col-md-4 col-sm-4" style="border: 1px solid black; height: 500px; margin-right: 20px;">


      <h1 style="text-align: center;">Réservez</h1>
      <row>
      <div class="form-group">

          <div class="row">
            <div class="col-sm-12">
              <label>Où</label>
              <input type="text" class="form-control placeholder="First name">
            </div>
          </div>
         
           <div class="row">  
               <div class="col-md-12">
                <label >Date</label>
             <!-- <input type="email" class="form-control" id="inputEmail4" placeholder="Email"> -->
                <input class="form-control" id="arrivee" type="text" format="">
              </div>
             
            </div>

            <div class="row">
              <div class="col-md-6">
                <label>Voyageurs</label>
                <input class="form-control" type="number" min="1" max="10" class="col-sm-12" name="">
              </div>
            </div>  
          </div>    

          <div class="row">
            <div class="col-md-6 pull-right">    
              <button type="button" class="form-control btn btn-primary">Rechercher</button>
            </div>  
          </div>

         

                
              
  
      </div>
        
   
    </div>
    
    </div>

  </div>
  
</body>
</html>