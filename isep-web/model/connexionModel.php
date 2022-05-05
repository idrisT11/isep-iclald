<?php

    $db_connexion = db_login();

    if($db_connexion->connect_error)
        die('Erreur : ' .$conn->connect_error);

    function is_user_registred($db_connexion, $email, $password){
        $cmd = "SELECT * FROM users WHERE email = ? AND VERIFIED = 1";
        $request = $db_connexion->prepare($cmd);
        $request->bind_param("s", $email);
        $request->execute();
        $result = $request->get_result();

        if ($request->affected_rows == 1) 
        {
            $row = $result->fetch_assoc();
            $user_hash = $row['HASH'];
    
            return password_verify($password, $user_hash);
        }
        else
            return 0;

    }

    function get_token_user($db_connexion, $email){
        $request = $db_connexion->prepare("SELECT * FROM users WHERE EMAIL = ?");
        
        $request->bind_param("s", $email);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();
        $verified = $row["TOKEN_USER"];

        return $verified;
    }

    
    function get_from_user($db_connexion, $email, $CHAMPS){
        $request = $db_connexion->prepare("SELECT * FROM users WHERE EMAIL = ?");
        
        $request->bind_param("s", $email);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();
        $value = $row[$CHAMPS];

        return $value;
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