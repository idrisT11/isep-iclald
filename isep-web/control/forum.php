<?php
    session_start();

    require_once( __DIR__ .  "\..\model\\profilPicModel.php");

    if (isset($_SESSION['connected']) && $_SESSION['connected']) {

        
        if (isset($_GET['new_topic'])) 
        {   
            if ($_GET['new_topic'] == "") {
                include(__DIR__ . "/../view/forum_post.php");
            }

        }

        else if (isset($_GET['post'])) {
            include(__DIR__ . "/../view/forum_conversation.php");
        }


        #Sinon on renvoie la page
        else{
            include(__DIR__ . "/../view/forum.php");
        }

    }

    else{
        echo "Vous devez d'abord vous authentifier";
        ?>
            <a href="./connexion">Revenir à la page d'authentification</a>
        <?php
    }




?>