<?php 
$page_name = "inscription.php";
require('entete.php');
require('database_auth.php'); ?>

<script type="text/javascript"> 
	var flag_password_created = false;
	var flag_username_created = false;
	//Variables globales accesibles dans tout le code.
	/*Les flags indiquent des erreurs lors du remplissage du formulaire d'inscription.
	Les flags ont comme valeur initiale false, en effet, aucune erreur n'est a signalé au chargement de la page.
	*/
</script>

	<script src="js/inscription.js"></script>
	<div class="container">

	  <form class="form-signin" id="form_inscription" action="redirection_inscription.php" method="post">
		<h2 class="form-signin-heading">Inscription</h2>
		
		<div class="input-group">
		  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		  <input type="text" id="inputUsername" name="inputUsername" class="form-control" maxlength="50" minlength="4" placeholder="Nom d'utilisateur" required autofocus>
		  <script type="text/javascript"> $('#inputUsername').on('input', verif_dispo_login_ajax); </script>
		</div>

		<div class="input-group">
		  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		  <input type="password" id="inputPassword" name="inputPassword" class="form-control" maxlength="100" minlength="6" placeholder="Mot de passe" required>
		  <script type="text/javascript"> $('#inputPassword').on('input', egalite_mdp); </script>
		</div>
		
		 <div class="input-group">
		  <span class="input-group-addon"><i class="glyphicon glyphicon-hand-up"></i></span>
		  <input type="password" id="inputPasswordConfirm" name="inputPasswordConfirm" class="form-control" maxlength="100" minlength="6" placeholder="Confirmer le mot de passe" required>
		  <script type="text/javascript"> $('#inputPasswordConfirm').on('input', egalite_mdp); </script>
		</div>

		<button id="signupConfirm" class="btn btn-lg btn-danger btn-block auth_form_submitter active" type="submit">Inscription</button>
		
	  </form>

	</div>
		
	</body>
</html>