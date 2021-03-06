<?php
    $current_salle = isset($_GET['config']) ? $_GET['config'] : $_SESSION['salle'];
?>

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
                        Configurations de la <em> salle <?= $current_salle ?> </em> :
                    </h1>

                    <a href="./dash" id="configure_link">
                        Retour
                    </a>
                </div>


                <div id="config_db">
                    <h1>Configurer le seuil de detection sonore :</h1>

                    <div>
                        <div id="68" class="db_btn">68 dB</div>
                        <div id="74" class="db_btn">74 dB</div>
                        <div id="80" class="db_btn">80 dB</div>
                    </div>
                </div>


                <div id="config_lumi">
                <h1>Configurer la luminosit?? de l'??cran :</h1>
                    <div id="bar_lumi">
                        <span id="left_lumi_arrow">???</span>
                        <div class="lumi_btn"></div>
                        <div class="lumi_btn"></div>
                        <div class="lumi_btn"></div>
                        <div class="lumi_btn"></div>

                        <div class="lumi_btn"></div>
                        <div class="lumi_btn"></div>
                        <div class="lumi_btn"></div>
                        <div class="lumi_btn"></div>
                        <span id="right_lumi_arrow">???</span>
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

    <script>
        var salle = <?= $_GET['config'] ?>;
    </script>

    <script src="./static/script/dash_gest.js"></script>

    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script> 
</body>
</html>