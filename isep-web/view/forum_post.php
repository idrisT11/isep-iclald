<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./static/style/forume_post.css" media="(min-width: 950px)">
    <link rel="stylesheet" href="./static/style/mobile/forume_post.css" media="(max-width: 950px)">
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
                    <h1>Nouveau Topic</h1> 
                    <p><?=$datum?></p> 
                </div>

                <?php include(__DIR__ . './_header.php'); ?>
            </div>

            <section id="content">
                <div id="content_header">
                    <h1 id="title_content">
                        Créer un poste pour ouvrir un nouveau topic :
                    </h1>

                    <a href="./forum" id="configure_link" style="font-weight: bold;">
                        retour ➽
                    </a>

                </div>

                <form id="forum_screen" method="POST" action="./forum?new_topic">

                    <div>
                        <h2>Nom du Topic</h2>
                        <input type="text" name="titre">
                    </div>
                    <div>
                        <h2>Type de question</h2>
                        <select name="type" onChange="combo(this, 'theinput')">
                            <option value="Problème Technique">Problème Technique</option>
                            <option value="Problème d'authentification">Problème d'authentification</option>
                            <option value="Question générale sur le produit">Question générale sur le produit</option>
                            <option value="Autre">Autre</option>
                        </select> 
                    </div>

                    <div>
                        <h2>Contenu :</h2>
                        <textarea name="content" id="content"></textarea>
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