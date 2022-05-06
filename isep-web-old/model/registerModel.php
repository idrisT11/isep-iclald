<?php

    $db_connexion = db_login();

    if($db_connexion->connect_error)
        die('Erreur : ' .$conn->connect_error);

    function is_user_registred($db_connexion, $email){
        $request = $db_connexion->prepare("SELECT * FROM users WHERE EMAIL = ?");
        $request->bind_param("s", $email);
        $request->execute();
        $request->get_result(); 

        return $request->affected_rows == 1;
    }

    function is_user_verified($db_connexion, $email){
        $request = $db_connexion->prepare("SELECT * FROM users WHERE EMAIL = ?");
        
        $request->bind_param("s", $email);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();
        $verified = $row["VERIFIED"];

        return $verified;
    }
    
    function update_user_hash($db_connexion, $email, $hash, $token_user){
        $str = "UPDATE users SET HASH = ?, TOKEN_USER = ? WHERE EMAIL = ?";
        $request = $db_connexion->prepare($str);
        $request->bind_param("sss", $hash, $token_user, $email);
        $request->execute();
    }

    function insert_token($db_connexion, $token_user, $token_rnd){
        $str = "INSERT INTO register_mails(TOKEN_USER, TOKEN_RND) VALUES (?, ?)";
        $request = $db_connexion->prepare($str);
        $request->bind_param("ss", $token_user, $token_rnd);
        $request->execute();
    }


    function db_login(){
        $servername = 'localhost';
        $sql_username = 'root';
        $sql_password = '';

        $db_name = 'iclald';

        $connexion = new mysqli($servername, $sql_username, $sql_password, $db_name);


        if($connexion->connect_error){
            die('Erreur : ' .$connexion->connect_error);
        }

        return $connexion;
    }


?>