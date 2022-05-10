<?php
    session_start();

    require_once( __DIR__ .  "\..\model\\forumModel.php");

    if (isset($_SESSION['connected']) && $_SESSION['connected']) {

        
        if (isset($_GET['new_topic'])) 
        {   
            if (isset($_POST['titre']) && isset($_POST['type']) && isset($_POST['content'])) 
            {
                $token = get_token_from_email($db_connexion, $_SESSION['email']);
                add_topic($db_connexion, $_POST['titre'], $_POST['type'], $_POST['content'], $token);

                header('Location: ./forum');
            }
            else
            {
                include(__DIR__ . "/../view/forum_post.php");
            }

        }

        else if (isset($_GET['post'])) {

            if (isset($_GET['action']) && $_GET['action'] == 'respond') 
            {
                $token = get_token_from_email($db_connexion, $_SESSION['email']);
                $nom = $_SESSION['nom'];
                $prenom = $_SESSION['prenom'];
                $content = $_POST['reponse'];

                add_to_conversation($db_connexion, $_GET['post'], $token, $nom, $prenom, $content);

                header('Location: ./forum?post='.$_GET['post']);

            } 

            else if (isset($_GET['action']) && $_GET['action'] == 'delete') 
            {

                if ($_SESSION['role'] != 2) {
                    echo "Vous n'avez pas accès à cette commande";
                    die();
                }

                delete_topic($db_connexion, $_GET['post']);

                header('Location: ./forum');

            } 

            else {
                $topic = get_topic_from_id($db_connexion, $_GET['post']);

                include(__DIR__ . "/../view/forum_conversation.php");   
            }

        }
        
        else if (isset($_GET['filtrer'])) {
            $value = $_GET['filtrer'];
            $topics = get_topics_by_name($db_connexion, $value);

            include(__DIR__ . "/../view/forum.php");      
        }
        #Sinon on renvoie la page
        else{

            $topics = get_topics($db_connexion);

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