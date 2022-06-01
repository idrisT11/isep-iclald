<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profil</title>

	<link rel="stylesheet" href="/isep-web/static/style/page-profil.css" media="(min-width: 950px)">
	<link rel="stylesheet" href="/isep-web/static/style/mobile/page-profil.css" media="(max-width: 950px)">	<link rel="stylesheet" type="text/css" href="/isep-web/static/fonts/font.css">
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	
</head>
<body>
	<header id="head">
		<p>
			<a href="Page d'accueil"><img src=".\static\image\IM.png" alt="Home"></a>
		</p>
		
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
		
		<form id="conteneur" action="./profil?modif=true&token_user=<?= $user['TOKEN_USER'] ?>" method="POST">
			<div id="perso">
				<h4>Informarions détaillées</h4>
				<h5>Genre</h5>
                <input class="type" type="text" value="<?= $user['GENRE'] ?>" name="genre">
				<h5>Nom</h5>
                <input class="type" type="text" value="<?= $user['NOM'] ?>" name="nom">
				<h5>Prénom</h5>
                <input class="type" type="text" value="<?= $user['PRENOM'] ?>" name="prenom">
				<h5>Date de naisance</h5>
                <input class="type" type="text" value="<?= $user['DATE_NAISSANCE'] ?>" name="date_naissance">
				<h5>Mail</h5>
                <input class="type" type="text" value="<?= $user['EMAIL'] ?>" name="email">
				<h5>Ville</h5>
                <input class="type" type="text" value="<?= $user['VILLE'] ?>" name="ville">
				<h5>Salle</h5>
                <input class="type" type="text" value="<?= $user['SALLE'] ?>" name="salle">
			</div>

			<div id="autres">
				<h4>Divers</h4>	
				<h5>Taille en cm</h5>
                <input class="type" type="text" value="<?= $user['TAILLE'] ?>" name="taille">
				<h5>Poids en kg</h5>
                <input class="type" type="text" value="<?= $user['POID'] ?>" name="poid">
		
				<h4>Information connexion</h4>
				<h5>Premier accès au site</h5>
				<p class="type"><?= $user['PREMIER_ACCES'] ?></p>
				<h5>Dernière connexion</h5>
				<p class="type"><?= $user['DERNIER_ACCES'] ?></p>
				
                <button id="modif" type="submit">Confirmer</button>

			</div>


        </form>
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