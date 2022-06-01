
<?php
    $current_salle = isset($_GET['salle']) ? $_GET['salle'] : $_SESSION['salle'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./static/style/dashboard.css" media="(min-width: 950px)">
    <link rel="stylesheet" href="./static/style/mobile/dashboard.css" media="(max-width: 950px)">
    <link rel="stylesheet" href="./static/fonts/font.css">

    <title>DashBoard</title>
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
                    <h1>DashBoard</h1> 
                    <p><?=$datum?></p> 
                </div>

                <?php include(__DIR__ . '/_header.php'); ?>
            </div>

            <section id="content">
                <div id="content_header">
                    <h1 id="title_content">
                        Valeurs concernant la salle <?= $current_salle ?> :
                    </h1>

                    <?php 
                    if ($_SESSION['role'] > 0) 
                    {
                    ?>
                        <a href="./dash?config=<?=$current_salle?>" id="configure_link">
                            Configuration ➽
                        </a>
                    <?php
                    }
                    ?>

                    <?php 
                    if ($_SESSION['role'] > 0) 
                    {
                    ?>
                    <div id="salle_ctn">
                        <a href="./dash?salle=11" class="salle_link" <?= ($current_salle=="11")?'id="salle_link_selected"': '' ?>>
                            Salle 11
                        </a>
                        <a href="./dash?salle=12" class="salle_link" <?= ($current_salle=="12")?'id="salle_link_selected"': '' ?>>
                            Salle 12
                        </a>
                        <a href="./dash?salle=13" class="salle_link" <?= ($current_salle=="13")?'id="salle_link_selected"': '' ?>>
                            Salle 13
                        </a>
                        <a href="./dash?salle=14" class="salle_link" <?= ($current_salle=="14")?'id="salle_link_selected"': '' ?>>
                            Salle 14
                        </a>
                        <a href="./dash?salle=15" class="salle_link" <?= ($current_salle=="15")?'id="salle_link_selected"': '' ?>>
                            Salle 15
                        </a>
                    </div>
                    <?php
                    }
                    ?>

                </div>


                <div id="valeur_inst">
                    <div class="zone_dash">
                        <h1>Temperature ambiante</h1>
                        <p id="tmp_instant">27.2°C</p>
                    </div>

                    <div class="zone_dash">
                        <h1>Niveau <br> sonore</h1>
                        <p id="snr_instant">65 dB</p>
                    </div>

                    <div class="zone_dash">
                        <h1>Niveau <br> d'humidité</h1>
                        <p id="hmd_instant">35%</p>
                    </div>

                    <div class="zone_dash">
                        <h1>Battement Cardiaque</h1>
                        <p id="crd_instant">80bpm</p>
                    </div>
                </div>


                <div id="graph_screen">
                    <div id=graph_interface>
                        <h2>Selectionnez une grandeur :</h2>

                        <button id="selected_grandeur" class="btn_grandeur" value="tmp">Temperature</button>
                        <hr>
                        <button class="btn_grandeur" value="hmd">humidité</button>
                        <hr>
                        <button class="btn_grandeur" value="snr">Niveau Sonore</button>
                    </div>

                    <canvas id="graph" style="width:100%;max-width:600px; height:100%;max-height:300px; ">

                    </canvas>
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