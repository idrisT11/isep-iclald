<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profil</title>
	<link rel="stylesheet" type="text/css" href="/isep-web/static/style/page-profil.css">
	<link rel="stylesheet" type="text/css" href="/isep-web/static/fonts/font.css">
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	
</head>
<body>
	<header id="head">
		<p>
			<a href="Page d'accueil"><img src=".\IM.png" alt="Home"></a>
		</p>
		
		<figure >
			<form action="changeProfilPic" method="POST" enctype="multipart/form-data" id="formImage">
				<label for="picInput">
						<img src=" <?php echo $_SESSION['profil_pic']; ?> " alt="Photo de profil" id="photo">
                        <input type="file" name="picInput" id="picInput" style="display: none;">
                </label>
				<figcaption>Jean de lafotaine</figcaption>
				<label for="picInput" style="text-decoration: underline">
					Modifier la photo
				</label>
			</form>
		</figure>

		<div class="formSub">
            <a type="submit" id="submit" class="submitOff" href="/isep-web/"> RETOUR </a>
        </div>

	</header>
	
	<div id="background_conteneur">
		<p id="vague1">

		</p>
		
		<div id="conteneur">
			<div id="perso">
				<h4>Informarions détaillées</h4>
				<h5>Genre</h5>
				<p class="type">Homme</p>
				<h5>Nom</h5>
				<p class="type">de lafontaine</p>
				<h5>Prénom</h5>
				<p class="type">Jean</p>
				<h5>Date de naisance</h5>
				<p class="type">10/10/1973</p>
				<h5>Mail</h5>
				<p class="type">macarenas@gmail.com</p>
				<h5>Ville</h5>
				<p class="type">Paris</p>
				<h5>Secteur</h5>
				<p class="type">Gestion financière</p>
			</div>

			<div id="autres">
				<h4>Divers</h4>	
				<h5>Taille</h5>
				<p class="type">190 cm</p>
				<h5>Poids</h5>
				<p class="type">84 kg</p>
		
				<h4>Information connexion</h4>
				<h5>Premier accès au site</h5>
				<p class="type">le 05/12/2021</p>
				<h5>Dernière connexion</h5>
				<p class="type">à l'instant</p>
				
				<button id="modif">Modifier le profil</button>
			</div>


		</div>
		<p id="vague2">

		</p>
	</div>


	<script>
		var imgInput = document.getElementById('picInput'),
			imgPhoto = document.getElementById('photo');
		var formImage = document.getElementById('formImage');

		imgInput.addEventListener('change', (e)=>{
			formImage.submit();
			
		});
	</script>

	
			
</body>
</html>