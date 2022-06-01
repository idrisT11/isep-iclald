<?php

    $db_connexion = db_login();

    if($db_connexion->connect_error)
        die('Erreur : ' .$conn->connect_error);

    function get_pic_from_id($db_connexion, $id){
        $cmd = "SELECT * FROM users WHERE ID = ?";
        $request = $db_connexion->prepare($cmd);
        $request->bind_param("s", $id);
        $request->execute();
        $result = $request->get_result();
        $row = $result->fetch_assoc();
        
        $token = $row['TOKEN_USER'];

        if ( file_exists('./static/image/profil_pic/'.$token.'.png') ) {
            return '/isep-web/static/image/profil_pic/'.$token.'.png';
        }
        else{
            return '/isep-web/static/image/profil_pic/default.png';
        }
    }

    function get_name_from_id($db_connexion, $id){
        $cmd = "SELECT * FROM users WHERE ID = ?";
        $request = $db_connexion->prepare($cmd);
        $request->bind_param("s", $id);
        $request->execute();
        $result = $request->get_result();
        $row = $result->fetch_assoc();
        
        return $row['NOM'];
    }

    function get_surname_from_id($db_connexion, $id){
        $cmd = "SELECT * FROM users WHERE ID = ?";
        $request = $db_connexion->prepare($cmd);
        $request->bind_param("s", $id);
        $request->execute();
        $result = $request->get_result();
        $row = $result->fetch_assoc();
        
        return $row['PRENOM'];
    }


    function get_id_from_email($db_connexion, $email){
        $cmd = "SELECT * FROM users WHERE EMAIL = ?";
        $request = $db_connexion->prepare($cmd);
        $request->bind_param("s", $email);
        $request->execute();
        $result = $request->get_result();
        $row = $result->fetch_assoc();

        return $row['ID'];
    }

    function get_conv_from_userID($db_connexion, $id_user){
        $cmd = "SELECT * FROM conversation WHERE USER = ?";
        $request = $db_connexion->prepare($cmd);
        $request->bind_param("s", $id_user);
        $request->execute();
        $result = $request->get_result();

        if ($request->affected_rows == 1) 
        {
            $row = $result->fetch_assoc();

            return $row['CONTENU']; 
        }
        else
            return NULL;
    }

    function get_convs($db_connexion){
        $cmd = "SELECT * FROM conversation";
        $request = $db_connexion->prepare($cmd);
        $request->execute();
        $result = $request->get_result(); 
        $row = $result->fetch_all(MYSQLI_ASSOC);

        return $row;
    }

    function update_conversation($db_connexion, $id_user, $conversation)
    {
        $cmd = "UPDATE conversation SET CONTENU = ?, LAST_MESSAGE=current_timestamp(), LU=0 WHERE USER = ?";
        $request = $db_connexion->prepare($cmd);
        $request->bind_param("ss", $conversation, $id_user);
        $request->execute();
    }

    function create_conversation($db_connexion, $id_user, $conversation)
    {
        $cmd = "INSERT INTO conversation(USER, CONTENU) VALUES( ?, ?)";
        $request = $db_connexion->prepare($cmd);
        $request->bind_param("ss", $id_user, $conversation);
        $request->execute();
    }


?>