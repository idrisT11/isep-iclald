<?php

    $db_connexion = db_login();

    if($db_connexion->connect_error)
        die('Erreur : ' .$conn->connect_error);

    function get_token_from_email($db_connexion, $email){
        $request = $db_connexion->prepare("SELECT * FROM users WHERE EMAIL = ?");
        
        $request->bind_param("s", $email);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();
        $token = $row["TOKEN_USER"];

        return $token;
    }

    function get_profil_pic($db_connexion, $email){
        $token = get_token_from_email($db_connexion, $email);

        if ( file_exists('./static/image/profil_pic/'.$token.'.png') ) {
            return '/isep-web/static/image/profil_pic/'.$token.'.png';
        }
        else{
            return '/isep-web/static/image/profil_pic/default.png';
        }
    }

    function chargeImage($token, $file){
        $path = './static/image/profil_pic/';
        copy($file, $path . $token . '.png');

        return $path . $token . '.png';
    }

    
?>