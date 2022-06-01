<?php
    session_start();
    
    require_once( __DIR__ .  "/../model/db_connexion.php");
    require_once( __DIR__ .  "/../model/faqModel.php");

    if (isset($_SESSION['connected']) && $_SESSION['connected'] && $_SESSION['role'] == 2 ) {
        
        if (isset($_GET['admin'])) {
            $questions = get_all_faq($db_connexion);
            include(__DIR__ . "/../view/faqAdminView.php");
            die();       
        }

        if (!isset($_GET['action'])) {
            $questions = get_all_faq($db_connexion);
            include(__DIR__ . "/../view/faqView.php");
            die();
        }

        //Ajouter une question
        if ($_GET['action'] == 'add' && isset($_GET['titre']) && isset($_GET['contenu'])) {
            $titre = $_GET['titre'];
            $contenu = $_GET['contenu'];
            add_question($db_connexion, $titre, $contenu);
            header('Location: ./faq?admin');

        }
        elseif ($_GET['action'] == 'add') {
            $action = 'add';
            $id = -1;
            $titre = "";
            $contenu = "";
            include(__DIR__ . "/../view/faqModView.php");
            die();
        
        }

        //Supprimer une questin
        else if ($_GET['action'] == 'delete' && isset($_GET['question_id'])) {
            $id = $_GET['question_id'];
            delete_question($db_connexion, $id);
            header('Location: ./faq?admin');

        }

        //Modifier une question
        else if ($_GET['action'] == 'update' && isset($_GET['question_id']) && isset($_GET['titre']) && isset($_GET['contenu'])) {

            $id = $_GET['question_id'];
            $titre = $_GET['titre'];
            $contenu = $_GET['contenu'];
            update_question_from_id($db_connexion, $id, $titre, $contenu);
            header('Location: ./faq?admin');
        }
        else if ($_GET['action'] && isset($_GET['question_id'])) {
            $action = 'update';
            $id = $_GET['question_id'];
            $question = get_question_from_id($db_connexion, $id);

            $titre = $question['TITRE'];
            $contenu = $question['CONTENU'];

            include(__DIR__ . "/../view/faqModView.php");
            die();
        }

    }

    else{
        $questions = get_all_faq($db_connexion);
        include(__DIR__ . "/../view/faqView.php");

    }

?>