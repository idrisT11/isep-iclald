<?php
    require_once( __DIR__ .  "/db_connect.php");

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

    function get_all_users($db_connexion){
        $request = $db_connexion->prepare("SELECT * FROM users");
        
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_all(MYSQLI_ASSOC);

        return $row;
    }

    function get_users_with_name($db_connexion, $name){
        $name_surname = explode(' ', $name);

        if (count($name_surname) == 1) 
        {
            $request = $db_connexion->prepare("SET @NOM_USER = ? ");
            $request->bind_param("s", $name_surname[0]);
            $request->execute();

            $request = $db_connexion->prepare("SET @NOM_USER = CONCAT('%' , @NOM_USER, '%') ");
            $request->execute();


            
            $req_str = "SELECT * FROM users WHERE (NOM LIKE @NOM_USER) OR (PRENOM LIKE @NOM_USER)";
            $request = $db_connexion->prepare($req_str);
            
        }

        else{
            $request = $db_connexion->prepare("SET @NOM1_USER = ?, @NOM2_USER = ?");
            $request->bind_param("ss", $name_surname[0], $name_surname[1]);
            $request->execute();

            $request = $db_connexion->prepare("SET @NOM1_USER = CONCAT('%' , @NOM1_USER, '%'),
            @NOM2_USER = CONCAT('%' , @NOM2_USER, '%')");
            $request->execute();

            $req_str = "SELECT * FROM users WHERE ((NOM LIKE @NOM1_USER) AND (PRENOM LIKE @NOM2_USER)) OR ((PRENOM LIKE @NOM1_USER) AND (NOM LIKE @NOM2_USER))";
            $request = $db_connexion->prepare($req_str);            
        }

        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_all(MYSQLI_ASSOC);

        return $row;
    }


    function get_token_from_email($db_connexion, $email){
        $request = $db_connexion->prepare("SELECT * FROM users WHERE EMAIL = ?");
        
        $request->bind_param("s", $email);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc(MYSQLI_ASSOC);
        $email = $row["TOKEN_USER"];

        return $email;
    }
    

   
?>