<?php
	$page_name="home.php";
  require ('entete.php');
  //require('../database_auth.php');
?>

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