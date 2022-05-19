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

    function get_all_users($db_connexion){
        $request = $db_connexion->prepare("SELECT * FROM users");
        
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_all(MYSQLI_ASSOC);

        return $row;
    }


    function get_profil_pic($token){

        if ( file_exists('./static/image/profil_pic/'.$token.'.png') ) {
            return '/isep-web/static/image/profil_pic/'.$token.'.png';
        }
        else{
            return '/isep-web/static/image/profil_pic/default.png';
        }
    }

    //Ces deux fonctions devraient etre dans le modèle du profil
    function add_user($db_connexion, $nom, $prenom, $email, $role, $genre, $salle, $datenaissance, $ville, $taille, $poid)
    {
        $token = hash('sha256', $email);
        $cmd = "INSERT INTO `users`(`NOM`, `PRENOM`, `EMAIL`, `TOKEN_USER`, `SALLE`, `ROLE`, `GENRE`, `DATE_NAISSANCE`, `VILLE`, `TAILLE`, `POID`) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $request = $db_connexion->prepare($cmd);
        $request->bind_param("sssssssssss", $nom, $prenom, $email, $token, $salle,  $role, $genre, $datenaissance, $ville, $taille, $poid);
        $request->execute();
    }

    function delete_user($db_connexion, $token)
    {
        $request = $db_connexion->prepare("DELETE FROM `users` WHERE TOKEN_USER = ?");
        $request->bind_param("s", $token);
        $request->execute();
    }

    

?>