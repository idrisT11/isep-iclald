<?php
    session_start();

    require_once( __DIR__ .  "\..\model\\profilPicModel.php");
    require_once( __DIR__ .  "\..\model\\mapModel.php");

    if (isset($_SESSION['connected']) && $_SESSION['connected']) {

        if (isset($_GET['action'])) 
        {   
            if ($_GET['action'] == "moyenne_nationale" && isset($_GET['pays'])) {
                
                echo get_moyenne_bled($db_connexion, $_GET['pays']);
            }

            else if ($_GET['action'] == "graph_values" && isset($_GET['pays'])) {
                
                echo get_graph_bled($db_connexion, $_GET['pays']);
            }

            else if ($_GET['action'] == "moyenne_ville" && isset($_GET['ville'])) {
                
                echo get_moyenne_ville($db_connexion, $_GET['ville']);
            }
        }

        else{
            include(__DIR__ . "/../view/map.php");
        }

    }

    else{
        echo "Vous devez d'abord vous authentifier";
        ?>
            <a href="./connexion">Revenir à la page d'authentification</a>
        <?php
    }


    

?>