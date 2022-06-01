<?php
    session_start(); 

    require_once( __DIR__ .  "/../model/db_connexion.php");
    require_once( __DIR__ .  "\..\model\\quickMessageModel.php");

    if (isset($_SESSION['connected']) && $_SESSION['connected'] && $_SESSION['role']=='2') {
        
        if (!isset($_GET['action'])) {

            include(__DIR__ . "/../view/message_admin.php");
            die();
        }

        else if (isset($_GET['action']) && $_GET['action'] == 'get_convs') 
        {
            $convs_list = get_convs($db_connexion);

            for ($i=0; $i < count($convs_list); $i++) { 
                $id = $convs_list[$i]['USER'];
                $convs_list[$i]['PIC_PATH'] = get_pic_from_id($db_connexion, $id);
                $convs_list[$i]['PRENOM'] = get_name_from_id($db_connexion, $id);
                $convs_list[$i]['NOM'] = get_surname_from_id($db_connexion, $id);
            }

            echo json_encode($convs_list);
        }

        else if (isset($_GET['action']) && $_GET['action'] == 'get_conv' && isset($_GET['user'])) 
        {
            $conv = get_conv_from_userID($db_connexion, $_GET['user']);

            echo json_encode($conv);
        }

        //ADD A NEW MESSAGE
        if ($_GET['action'] == 'write' && isset($_GET['content']) && !empty($_GET['content']) && isset($_GET['user'])) 
        {   
            $email = $_SESSION['email'];
            $id_user = $_GET['user'];
            $id_admin = get_id_from_email($db_connexion, $email);
            $new_message = $_GET['content'];

            $conversation = get_conv_from_userID($db_connexion, $id_user);
            
            //L'USER A DEJA INITIER UNE CONV (Par securité on fait ça)
            if (!is_null($conversation) ) 
            {
                $conversation = json_decode($conversation);
                $id = count($conversation);

                $conversation[] = array('id'=>$id, 'writer'=>'admin', 'content'=>$new_message);
                $conv_json = json_encode($conversation);
                update_conversation($db_connexion, $id_user, $conv_json); 
            }
               
        }
        else if ($_GET['action'] == 'read_new' && isset($_GET['ID'])) {
            
        }
        else if ($_GET['action'] == 'read_all') {

            $email = $_SESSION['email'];
            $id_user = get_id_from_email($db_connexion, $email);
            $conversation = get_conv_from_userID($db_connexion, $id_user);

            echo $conversation;
        }


    }

    //ReturnEquity = RN/FondPropre > 10% = RN/CA * CA/Actif *Actif/.FondPropre
?>