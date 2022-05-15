<?php
    session_start();

    require_once( __DIR__ .  "/../model/profilPicModel.php");

    if (isset($_SESSION['connected']) && $_SESSION['connected']) {

        
        #Ici, on gere les requete du type demande de valeurs
        if (isset($_GET['grandeur']) && isset($_GET['nb_val'])) 
        {   
            echo get_grandeur_value($_GET['grandeur'], $_GET['nb_val']);
        }

        #Ici, on gere les requete du type changement de configurations
        else if (isset($_GET['config'])) 
        {
            if (isset($_GET['seuil'])) {
                
            }
            else if (isset($_GET['Lumin'])){

            }
            else{
                include(__DIR__ . "/../view/dashboard_config.php");
            }

        }

        #Sinon on renvoie la page
        else{
            include(__DIR__ . "/../view/dashboard.php");
        }

    }

    else{
        echo "Vous devez d'abord vous authentifier";
        ?>
            <a href="./connexion">Revenir à la page d'authentification</a>
        <?php
    }


    function get_grandeur_value($grandeur, $nb_val){

        $val_max = 0;
        $val_min = 0;

        $nb_val_max = 60;

        switch ($grandeur) {
            case 'tmp':
                $val_max = 28;
                $val_min = 26;
                break;
            
            case 'hmd':
                $val_max = 35;
                $val_min = 32;
                break;
            
            case 'snr':
                $val_max = 65;
                $val_min = 72;
                break;

            case 'crd':
                $val_max = 81;
                $val_min = 80;
                break;
        }

        if ($nb_val == 'een') {
            return rand($val_min*10, $val_max*10)/10;
        }
        else{
            $res = array();
            for ($i=0; $i < $nb_val_max; $i++) { 
               $res[] = rand($val_min*10, $val_max*10)/10;
            } 

            echo json_encode($res);
        }


    }

?>