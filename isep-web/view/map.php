<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./static/style/map.css">
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
                    <h1>Carte du Monde</h1> 
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
                        Pays selectionné : ---<em class="pays"> France </em>---
                    </h1>

                    <a href="#" id="configure_link" style="font-weight: bold;">
                        ▼
                    <div id="pays_pop_down">
                        <button class="country_btn">France</button>
                                <hr/>
                        <button class="country_btn">Chine</button>
                                <hr/>
                        <button class="country_btn">Egypte</button>
                                <hr/>
                        <button class="country_btn">Allemagne</button>
                    </div>
                    </a>

                </div>

                <div id="infos">

                
                    <div id="carte">
                        <img src="./static/image/pays/France.jpg" alt="france" height="450px" id="image_carte">
                    </div>

                    <div>
                        <div id="ville_stats_ctn">
                            <h1>Statisques pour la ville de <em class="ville"> Paris </em> </h1>
                            <div>
                                <span class="titlus_ville_stats">Taux de Carbonne</span>
                                <span id="ville_stats">28.4ug/m3</span>
                                <span class="titlus_ville_stats">Moyenne nationnale</span>
                                <span id="national_stats">128.4ug/m3</span>
                            </div>
                        </div>


                        <div id="graphe">
                            <h1>Graphe de l'évolution du taux de carbonne en  <em class="pays"> France </em> </h1>
                            <canvas id="graph" style="width:100%;max-width:600px; height:100%;max-height:300px; ">
                        </div>
                    </div>

                </div>


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


        //PopDown selection pays
        var cfg = document.getElementById('configure_link'),
            pays_pop_down = document.getElementById('pays_pop_down');
        var displayed_pays = false;

        cfg.onclick = ()=>{
            if (displayed_pays) {
                pays_pop_down.style.display = 'none';
                
            } else {
                pays_pop_down.style.display = 'flex';
            }
            displayed_pays = !displayed_pays;
        }
    </script>

    <script src="./static/script/map.js"></script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script> 
</body>
</html>