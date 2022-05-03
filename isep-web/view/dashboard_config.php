<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./static/style/dashboard_config.css">
    <link rel="stylesheet" href="./static/fonts/font.css">

    <title>DashBoard</title>
</head>
<body>
    <div id="window">
        <nav>
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
                    <h1>DashBoard</h1> 
                    <p>Samedi 30 avril 2022</p> 
                </div>

                <div id="header_profil">
                    <a href="./profil">
                        <img src="<?php echo $_SESSION['profil_pic']; ?>" alt="Profil">
                    </a>
                    <div id="nom_btn">
                        <span id="nom_prenom">
                        <?php echo $_SESSION['nom']. ", " . $_SESSION['prenom'] . "      ▼" ?>
                        </span>
                        <div id="deco_pop_down">
                                <a href="./profil">Mon Profil</a>
                                <hr/>
                                <a href="./deconnexion">Deconnexion</a>
                        </div>
                    </div>


                </div>
            </div>

            <section id="content">
                <div id="content_header">
                    <h1 id="title_content">
                        Configurations de la <em> salle <?php echo $_SESSION['salle']?> </em> :
                    </h1>

                    <a href="./dash" id="configure_link">
                        Retour
                    </a>
                </div>


                <div id="config_db">
                    <h1>Configurer le seuil de detection sonore :</h1>

                    <div>
                        <div class="db_btn" id="selected_db_btn">68 dB</div>
                        <div class="db_btn">74 dB</div>
                        <div class="db_btn">80 dB</div>
                    </div>
                </div>


                <div id="config_lumi">
                <h1>Configurer la luminosité de l'écran :</h1>
                    <div id="bar_lumi">
                        <span>❰</span>
                        <div class="colored" class="lumi_btn"></div>
                        <div class="colored" class="lumi_btn"></div>
                        <div class="colored" class="lumi_btn"></div>
                        <div class="lumi_btn"></div>

                        <div class="lumi_btn"></div>
                        <div class="lumi_btn"></div>
                        <div class="lumi_btn"></div>
                        <div class="lumi_btn"></div>
                        <span>❱</span>
                    </div>
                </div>

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
            console.log(displayed);
        }
    </script>

    <script src="./static/script/dash.js"></script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script> 
</body>
</html>