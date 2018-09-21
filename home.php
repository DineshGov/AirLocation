<?php session_start(); ?>
<?php 
	$page_name="home.php";
	require ('entete.php');
	if(isset($_SESSION['idUser']))
		echo "<input type='hidden' id='idUser' value='{$_SESSION['idUser']}'/>";
	else
		echo "<input type='hidden' id='idUser' value=''/>";
?>
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <div class="col-lg-12 col-md-12 col-sm-12">

  <div id="notification"></div>

    <div id="boite" class="col-lg-4 col-md-4 col-sm-4">
      
      <h2>Réservez des logements<br>et des expériences<br>uniques.</h2>
      
        <form method="post" action="requete_ajax_home.php">


          <div class="row ">
             
            <div id="champ_recherche" class="inner-addon left-addon">
              
                <i class="glyphicon glyphicon-map-marker"></i>
              
              <input type="text" id="destination" class="form-control" placeholder="Où ?" name="destination">
            </div>
          </div>


           <div class="row">  
               <div id="champ_calendrier" class="inner-addon left-addon">
                <i class="glyphicon glyphicon-calendar"></i>

                <input class="form-control" type="text" placeholder="Date" name="date" id="date">
              </div>
             
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-6 col-lg-6">

                <div class="inner-addon left-addon">
                  <i class="glyphicon glyphicon-user"></i>  
                  <input class="form-control" type="number" min="1" max="10" placeholder="Voyageurs" name="voyageurs" id="voyageurs">
                </div>
               </div> 
            </div> 
               
			
			   
          <div class="row"">
            <div class="col-sm-6 col-md-6 col-lg-6 pull-right">    
              <button id="recherche" type="button" class="form-control btn btn-danger">Rechercher</button>
            </div>  
          </div>
        </form>

    </div>

    <div id="mapid" class='col-md-7 col-sm-7 col-lg-7'></div>

    <div class="resultats"></div>
	
  </div>

</body>
</html>