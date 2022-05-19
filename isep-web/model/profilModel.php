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

    function get_id_from_email($db_connexion, $email){
        $request = $db_connexion->prepare("SELECT * FROM users WHERE EMAIL = ?");
        
        $request->bind_param("s", $email);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();
        $email = $row["ID"];

        return $email;
    }



    function get_profil_pic($token){

        if ( file_exists('./static/image/profil_pic/'.$token.'.png') ) {
            return '/isep-web/static/image/profil_pic/'.$token.'.png';
        }
        else{
            return '/isep-web/static/image/profil_pic/default.png';
        }
    }

    function update_user($db_connexion, $nom, $prenom, $email, $genre, $salle, $datenaissance, $ville, $taille, $poid, $id)
    {
        $token = hash('sha256', $email);
        $cmd = "UPDATE `users`
        SET `NOM` = ?, `PRENOM`=?, `EMAIL`=?, `TOKEN_USER`=?, `SALLE`=?,  `GENRE`=?, `DATE_NAISSANCE`=?, `VILLE`=?, `TAILLE`=?, `POID`=?
        WHERE ID=?";
        $request = $db_connexion->prepare($cmd);
        $request->bind_param("sssssssssss", $nom, $prenom, $email, $token, $salle, $genre, $datenaissance, $ville, $taille, $poid, $id);
        $request->execute();
    }


?>