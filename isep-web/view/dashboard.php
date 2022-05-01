<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./static/style/dashboard.css">
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
                    <img src="<?php echo $_SESSION['profil_pic']; ?>" alt="Profil">
                    <div>
                        <?php echo $_SESSION['nom']. ", " . $_SESSION['prenom'] . "      ▼" ?>
                    </div>
                </div>
            </div>

            <section id="content">
                <div id="content_header">
                    <h1 id="title_content">
                        Valeurs concernant la salle 11 :
                    </h1>

                    <a href="#" id="configure_link">
                        Configuration ➽
                    </a>
                </div>


                <div id="valeur_inst">
                    <div class="zone_dash">
                        <h1>Temperature</h1>
                        <p>27.2°C</p>
                    </div>

                    <div class="zone_dash">
                        <h1>Niveau sonore</h1>
                        <p>65 dB</p>
                    </div>

                    <div class="zone_dash">
                        <h1>Niveau d'humidité</h1>
                        <p>35%</p>
                    </div>
                </div>

            </section>
        </main>
    </div>
</body>
</html>