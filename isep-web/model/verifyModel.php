<?php

    $db_connexion = db_login();

    if($db_connexion->connect_error)
        die('Erreur : ' .$conn->connect_error);

    function is_user_verified($db_connexion, $token_user){
        $request = $db_connexion->prepare("SELECT * FROM users WHERE TOKEN_USER = ?");
        
        $request->bind_param("s", $token_user);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();
        $verified = $row["VERIFIED"];
        
        return $verified;
    }

    function set_user_verified($db_connexion, $token_user){
        $request = $db_connexion->prepare("UPDATE users SET VERIFIED = 1 WHERE TOKEN_USER = ?");
        
        $request->bind_param("s", $token_user);
        $request->execute();  
    }
    
    function is_tuple_in_db($db_connexion, $token_user, $token_rnd){
        $cmd = "SELECT * FROM register_mails WHERE TOKEN_USER = ? AND TOKEN_RND = ?";
        $request = $db_connexion->prepare($cmd);
        $request->bind_param("ss", $token_user, $token_rnd);
        $request->execute(); 
        $request->get_result();  

        return $request->affected_rows == 1;
    }

    function get_email_from_token($db_connexion, $token_user){
        $request = $db_connexion->prepare("SELECT * FROM users WHERE TOKEN_USER = ?");
        
        $request->bind_param("s", $token_user);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();
        $email = $row["EMAIL"];

        return $email;
    }


?>
