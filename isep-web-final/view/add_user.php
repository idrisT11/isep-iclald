<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./static/style/add_user.css">
    <link rel="stylesheet" href="./static/fonts/font.css">

    <title>Forum</title>
</head>
<body>
    <div id="window">
        <nav>
            <img src="./static/image/IM.png" width="50px" style="position: absolute">

            <div id="nav_ctn">

                <a href="./" class="nav_link">
                    <img src="./static/image/home.png" alt="home">
                </a>

                <a href="./dash" class="nav_link">
                    <img src="./static/image/graph.png" alt="dashboard">
                </a>

                <a href="./forum" class="nav_link">
                    <img src="./static/image/forum.png" alt="forum">
                </a>
                
                <a href="./map" class="nav_link">
                    <img src="./static/image/map.png" alt="map">
                </a>
                      
            </div>
        </nav>

        <main>
            
            <div id="header">
                <div id="header_title">
                    <h1>Nouvel utilisateur</h1> 
                    <p>Vendredi 6 mai 2022</p> 
                </div>

                <?php include(__DIR__ . '/_header.php'); ?>
            </div>

            <section id="content">
                <div id="content_header">
                    <h1 id="title_content">
                        Ajouter un utilisateur :
                    </h1>

                    <a href="./admin" id="configure_link" style="font-weight: bold;">
                        retour ➽
                    </a>

                </div>

                <form id="forum_screen" method="POST" action="./add-user">

                    <div id="info_part">
                        <div>
                            <h2>Informations générales</h2>
                            <input type="text" name="nom" placeholder="Nom">
                            <input type="text" name="prenom" placeholder="Prenom">
                            <input type="text" name="email" placeholder="E-mail">
                            <input type="text" name="genre" placeholder="Genre">
                            <select name="role" >
                                <option value="0">Utilisateur</option>
                                <option value="1">Technicien</option>
                                <option value="2">Administrateur</option>
                            </select> 
                        </div>
                        <hr>
                        <div>
                            <h2>Informations divers</h2>
                            <input type="date" name="datenaissance" placeholder="Date de naissance">
                            <input type="text" name="ville" placeholder="Ville">
                            <input type="text" name="salle" placeholder="Salle">
                            <input type="number" name="taille" placeholder="Taille">
                            <input type="number" name="poid" placeholder="Poid">
                        </div>
                    </div>

                    <div id="footer_form">
                        <input type="submit" value="Envoyer" id="submit">

                    </div>
                </form>


            </section>
        </main>
    </div>

    <script>
        //PopDown profil
        var btn = document.getElementById('nom_btn'),
            pop_down = document.getElementById('deco_pop_down');
        var displayed = false;
        btn.onclick = ()=>{
            if (displayed) {
                pop_down.style.display = 'none';
                
            } else {
                pop_down.style.display = 'flex';
            }
            displayed = !displayed;
        }

    </script>


</body>
</html>