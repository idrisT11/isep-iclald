<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./static/style/acceuil.css" media="(min-width: 950px)">
    <link rel="stylesheet" href="./static/style/mobile/acceuil.css" media="(max-width: 950px)">
    <link rel="stylesheet" href="./static/fonts/font.css">
    <link rel="stylesheet" href="./static/fonts/chat.css">

    <title>Acceuil</title>
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

                <?php
                    if ($_SESSION['role'] == 1) {
                ?>
                    <a href="./ticket" class="nav_link">
                        <img src="./static/image/ticket.svg" alt="map">
                    </a>
                <?php
                    }
                ?>
                      
            </div>
        </nav>

        <main>
            
            <div id="header">
                <div id="header_title">
                    <h1>Acceuil</h1> 
                    <p><?=$datum?></p> 
                </div>

                <?php include(__DIR__ . '/_header.php'); ?>
            </div>

            <section id="content">
                <div id="content_header">
                    <h1 id="title_content">
                        Bienvenue <?php echo $_SESSION['nom'].' '.$_SESSION['prenom']?> :
                    </h1>

                    <a href="./contacter" id="configure_link">
                        Contacter un Admin
                    </a>
                </div>

                
                <?php
                    if ($_SESSION['role'] != 0) {
                ?>
                <form method="GET" action="./profils-search" id="form_recherche">
                    <h1>Vous recherchez quelqu'un ? Allez-y !</h1>
                    <div id="recherche">
                        <input type="text" id="recherche_input" name="recherche_input" placeholder="Entrez votre recherche"/>
                        <input type="submit" id="recherche_btn" value="Rechercher"/>
                    </div>
                </form>
                <?php
                    } else {
                        ?>
                        <form id="form_recherche">
                            <h1>Vous avez avez un problème ? contactez les administrateurs par email, ou par
                                messagerie instantanée ! Vous pouvez toujours poser une question sur le forum ou verifier la FAQ.
                            </h1>

                        </form>
                        <?php
                            
                    }
                ?>

                <div >
                    <div id="acces_rapide">
                        <h1>Information d'acces rapide : </h1>
                        <a href="./dash" id="configure_link">
                            Acceder au dashboard
                        </a>
                    </div>
                    <div id="valeur_inst">
                        <div class="zone_dash">
                            <h1>Temperature ambiante</h1>
                            <p id="tmp_instant">27.2°C</p>
                        </div>

                        <div class="zone_dash">
                            <h1>Niveau <br/> sonore</h1>
                            <p id="snr_instant">65 dB</p>
                        </div>

                        <div class="zone_dash">
                            <h1>Niveau d'humidité</h1>
                            <p id="hmd_instant">35%</p>
                        </div>

                        <div class="zone_dash">
                            <h1>Battement Cardiaque</h1>
                            <p id="crd_instant">80bpm</p>
                        </div>
                    </div>
                </div>


                <?php 
                    if ($_SESSION['role'] < 2) {
                        include(__DIR__ . "/chat.html"); 
                        echo '<script src="./static/script/chat_user.js"></script>';
                    }
                    else{
                        include(__DIR__ . "/chat_list.html"); 
                        echo '<script src="./static/script/chat.js"></script>';

                    }
                ?>


            </section>
        </main>

            

    </div>

    <script>
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


    <!--<script src="./static/script/acceuil.js"></script>-->

</body>
</html>