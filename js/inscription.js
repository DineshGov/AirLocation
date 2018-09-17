	function gestion_btn_form_inscription(flag_password, flag_username){
 		//Il suffit qu'un seul flag soit activé pour que le bouton de soumission du formulaire soit désactivé.
 		if(flag_password || flag_username){
			$('.auth_form_submitter').removeClass('active');
			$('.auth_form_submitter').addClass('disabled');
			$('.auth_form_submitter').css('pointer-events', 'none');
 		}
 		//Si les deux flags sont désactivés alors on active le bouton.
 		if(!flag_password && !flag_username){
 			$('.auth_form_submitter').removeClass('disabled');
	    	$('.auth_form_submitter').addClass('active');
	    	$('.auth_form_submitter').css('pointer-events', 'auto');
 		}
	}

	function egalite_mdp(){
		if ($('#inputPasswordConfirm').val() !== $('#inputPassword').val()){
	    	if($('#inputPassword').val() !== '' && $('#inputPasswordConfirm').val() !== ''){
	        	if(!flag_password_created){
	          		var msg_error = '<p id="msg_error" class="h6 text-danger">Mots de passe différents</p>';
	          		$('#form_inscription').append(msg_error);	//Un message d'erreur est affiché.
	          		flag_password_created = true;	//Le flag correspondant à l'erreur concernant les mdps est activé.
	        	}
	        	gestion_btn_form_inscription(flag_password_created, flag_username_created);
	    	}
	    }
	  	else{
	  		//Il n'y a pas ou plus d'erreur dans le champ concerné.
	    	$('#msg_error').remove();
	    	if (flag_password_created){
	    		flag_password_created = false;
	    		//Le flag correspondant à l'erreur concernant les mdps est désactivé.
	    		gestion_btn_form_inscription(flag_password_created, flag_username_created);
	    	}
	 	}
	}

	function verif_dispo_login_ajax(){
		$.get("requete_ajax.php",  //on envoie en paramètre (ici login_2) la valeur du champ de texte au fichier requete_ajax.php
		{login_2: $('#inputUsername').val()},
		function(reponse)		//reponse du fichier requete_ajax.php (echo)
		{
			if(reponse=="erreur" && !flag_username_created){
				var msg_error_username = "<p id='msg_error_username' class='h6 text-danger'>Ce nom d'utilisateur existe déjà.</p>";
				$('#form_inscription').append(msg_error_username);	//Un message d'erreur est affiché.
				flag_username_created = true;	//Le flag correspondant à l'erreur concernant le username est activé.
				gestion_btn_form_inscription(flag_password_created, flag_username_created);
			}
			else if(reponse=="ok"){
				//si la variable reponse equivaut à "ok", on leve les restrictions concernant le bouton de formulaire
				$('#msg_error_username').remove();
				flag_username_created = false;	//Le flag correspondant à l'erreur concernant le username est désactivé.
				gestion_btn_form_inscription(flag_password_created, flag_username_created);
			}	
		})
	}