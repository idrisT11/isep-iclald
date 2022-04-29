<?php

    $db_connexion = db_login();

    if($db_connexion->connect_error)
        die('Erreur : ' .$conn->connect_error);

    function does_token_exit($db_connexion, $token){
        $cmd = "SELECT * FROM users WHERE TOKEN_USER = ?";
        $request = $db_connexion->prepare($cmd);
        $request->bind_param("s", $token);
        $request->execute();
        $result = $request->get_result();

        if ($request->affected_rows == 1) 
        {
            return 1;
        }
        else
            return 0;

    }

    function get_user_from_token($db_connexion, $token){
        $request = $db_connexion->prepare("SELECT * FROM users WHERE TOKEN_USER = ?");
        
        $request->bind_param("s", $token);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();

        return $row;
    }

    function get_token_from_email($db_connexion, $email){
        $request = $db_connexion->prepare("SELECT * FROM users WHERE EMAIL = ?");
        
        $request->bind_param("s", $email);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();
        $email = $row["TOKEN_USER"];

        return $email;
    }



    

    function db_login(){
        $servername = 'localhost';
        $sql_username = 'root';
        $sql_password = '';

        $db_name = 'iclald';

        $connexion = new mysqli($servername, $sql_username, $sql_password, $db_name);


        if($connexion->connect_error){
            die('Erreur : ' .$conn->connect_error);
        }

        return $connexion;
    }
?>