<?php
    require_once( __DIR__ .  "/db_connect.php");

    $db_connexion = db_login();

    if($db_connexion->connect_error)
        die('Erreur : ' .$conn->connect_error);

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

    function update_conversation($db_connexion, $id_user, $conversation)
    {
        $cmd = "UPDATE conversation SET CONTENU = ? WHERE USER = ?";
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