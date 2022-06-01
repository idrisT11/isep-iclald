<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profil</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="/isep-web/static/style/page-profil.css" media="(min-width: 950px)">
	<link rel="stylesheet" href="/isep-web/static/style/mobile/page-profil.css" media="(max-width: 950px)">
	<link rel="stylesheet" href="/isep-web/static/fonts/font.css" >
	<!--<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">-->
	
</head>
<body>
	<header id="head">

		
		<figure >
			<form action="changeProfilPic" method="POST" enctype="multipart/form-data" id="formImage">
				<label for="picInput">
						<img src=" <?= get_profil_pic($user['TOKEN_USER']) ?> " alt="Photo de profil" id="photo">
                        <input type="file" name="picInput" id="picInput" style="display: none;">
                </label>
				<figcaption> <?= $user['NOM'].' '.$user['PRENOM'] ?> </figcaption>
				<label for="picInput" style="text-decoration: underline">
					Modifier la photo
				</label>
			</form>
		</figure>

		<div class="formSub">
            <a type="submit" id="submit" class="submitOff" href="/isep-web/"> Retour </a>
        </div>

	</header>
	
	<div id="background_conteneur">
		<p id="vague1">

		</p>
		
		<div id="conteneur">
			<div id="perso">
				<h4>Informarions détaillées</h4>
				<h5>Genre</h5>
				<p class="type"><?= $user['GENRE'] ?> </p>
				<h5>Nom</h5>
				<p class="type"><?= $user['NOM'] ?></p>
				<h5>Prénom</h5>
				<p class="type"><?= $user['PRENOM'] ?></p>
				<h5>Date de naisance</h5>
				<p class="type"><?= $user['DATE_NAISSANCE'] ?></p>
				<h5>Mail</h5>
				<p class="type"><?= $user['EMAIL'] ?></p>
				<h5>Ville</h5>
				<p class="type"><?= $user['VILLE'] ?></p>
				<h5>Salle</h5>
				<p class="type"><?= $user['SALLE'] ?></p>
			</div>

			<div id="autres">
				<h4>Divers</h4>	
				<h5>Taille</h5>
				<p class="type"><?= $user['TAILLE'] ?> cm</p>
				<h5>Poids</h5>
				<p class="type"><?= $user['POID'] ?> kg</p>
		
				<h4>Information connexion</h4>
				<h5>Premier accès au site</h5>
				<p class="type"><?= $user['PREMIER_ACCES'] ?></p>
				<h5>Dernière connexion</h5>
				<p class="type"><?= $user['DERNIER_ACCES'] ?></p>
				
				<?php
				if ($current_token_user == $token_user or $_SESSION['role'] == 2 ) {
					?>
					<a href="./profil?modif=true&token_user=<?= $user['TOKEN_USER'] ?>">
					<button id="modif" >Modifier le profil</button>
					</a>
					<?php
				}
				?>
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