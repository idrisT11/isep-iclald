<?php
    session_start(); 
    require_once( __DIR__ .  "/../model/db_connexion.php");
    require_once( __DIR__ .  "\..\model\\quickMessageModel.php");

    if (isset($_SESSION['connected']) && $_SESSION['connected']) {
        
        if (!isset($_GET['action'])) {
            echo "wesh";
            die();
        }

        //ADD A NEW MESSAGE
        if ($_GET['action'] == 'write' && isset($_GET['content']) && !empty($_GET['content'])) 
        {
            
            $email = $_SESSION['email'];
            $id_user = get_id_from_email($db_connexion, $email);
            $new_message = $_GET['content'];

            $conversation = get_conv_from_userID($db_connexion, $id_user);
            
            //SI L'USER A DEJA INITIER UNE CONV
            if (!is_null($conversation) ) 
            {
                $conversation = json_decode($conversation);
                $id = count($conversation);

                $conversation[] = array('id'=>$id, 'writer'=>'user', 'content'=>$new_message);
                $conv_json = json_encode($conversation);
                update_conversation($db_connexion, $id_user, $conv_json); 
            }
            //SI L'USER INITIE UNE CONV POUR LA PREMIERE FOIS
            else
            {
                $conversation = array();
                $conversation[] = array('id'=>0, 'writer'=>'user', 'content'=>$new_message);
                $conv_json = json_encode($conversation);
                create_conversation($db_connexion, $id_user, $conv_json);
            }
               
        }
        else if ($_GET['action'] == 'read_new' && isset($_GET['id'])) 
        {
            $email = $_SESSION['email'];
            $id_user = get_id_from_email($db_connexion, $email);
            $conversation = get_conv_from_userID($db_connexion, $id_user);

            if (is_null($conversation) ){
                die("0");
            }

            if ($_GET['id'] == '-1') 
            {
                $email = $_SESSION['email'];
                $id_user = get_id_from_email($db_connexion, $email);
                $conversation = get_conv_from_userID($db_connexion, $id_user);
    
                echo $conversation; 
            }
            else
            {
                $email = $_SESSION['email'];
                $id_user = get_id_from_email($db_connexion, $email);
                $conversation = get_conv_from_userID($db_connexion, $id_user);
                $conv_ar = json_decode($conversation);
                $conv_ar = array_slice($conv_ar, $_GET['id']+1 );

                echo json_encode($conv_ar); 
            }
        }
        else if ($_GET['action'] == 'read_all') {

            $email = $_SESSION['email'];
            $id_user = get_id_from_email($db_connexion, $email);
            $conversation = get_conv_from_userID($db_connexion, $id_user);

            if (is_null($conversation) ){
                die("0");
            }

            echo $conversation;
        }


    }

    //ReturnEquity = RN/FondPropre > 10% = RN/CA * CA/Actif *Actif/.FondPropre
?>