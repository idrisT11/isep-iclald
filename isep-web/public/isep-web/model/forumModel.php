<?php

    $db_connexion = db_login();

    if($db_connexion->connect_error)
        die('Erreur : ' .$conn->connect_error);


    function get_topics($db_connexion){
        $request = $db_connexion->prepare("SELECT * FROM topics");
        
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_all(MYSQLI_ASSOC);

        return $row;
    }

    function get_topic_from_id($db_connexion, $id){
        $request = $db_connexion->prepare("SELECT * FROM topics WHERE ID = ?");
        $request->bind_param("s", $id);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();

        return $row;
    }

    function get_topics_by_name($db_connexion, $name){
        $request = $db_connexion->prepare("SELECT * FROM topics WHERE TITRE LIKE CONCAT('%', ?, '%') ");
        $request->bind_param("s", $name);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_all(MYSQLI_ASSOC);

        return $row;
    }


    function add_topic($db_connexion, $titre, $type, $content, $user_token){
        $request = $db_connexion->prepare("INSERT INTO `topics`(`AUTHOR_TOKEN`, `TITRE`, `CONTENU`, `CONVERSATION`, `TYPE`) 
        VALUES (?, ?, ?, '[]', ?)");
        $request->bind_param("ssss", $user_token, $titre, $content, $type);
    
        $request->execute();
    }

    function delete_topic($db_connexion, $id){
        $request = $db_connexion->prepare("DELETE FROM `topics` WHERE ID=?");
        $request->bind_param("s", $id);
    
        $request->execute();
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

    function add_to_conversation($db_connexion, $id, $token, $nom, $prenom, $content)
    {
        setlocale(LC_TIME, "fr_FR");
        
        $request = $db_connexion->prepare("SELECT CONVERSATION FROM topics WHERE ID = ?");
        $request->bind_param("s", $id);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();

        $conversation_array = json_decode( $row['CONVERSATION'] );
        $conversation_array[] = array(
            "token_user"=>$token,
            "nom"=>$nom,
            "prenom"=>$prenom,
            "content"=>$content,
            "date"=>strftime("Le %d.%M.%Y")
        );

        $conversation_str = json_encode($conversation_array);
        $request = $db_connexion->prepare("UPDATE topics SET CONVERSATION = ? WHERE ID = ?");
        $request->bind_param("ss", $conversation_str, $id);
        $request->execute();
    }



    function get_profil_pic($token){

        if ( file_exists('./static/image/profil_pic/'.$token.'.png') ) {
            return '/isep-web/static/image/profil_pic/'.$token.'.png';
        }
        else{
            return '/isep-web/static/image/profil_pic/default.png';
        }
    }

    function update_user($db_connexion, $nom, $prenom, $email, $genre, $salle, $datenaissance, $ville, $taille, $poid)
    {
        $token = hash('sha256', $email);
        $cmd = "UPDATE `users`
        SET `NOM` = ?, `PRENOM`=?, `EMAIL`=?, `TOKEN_USER`=?, `SALLE`=?,  `GENRE`=?, `DATE_NAISSANCE`=?, `VILLE`=?, `TAILLE`=?, `POID`=?";
        $request = $db_connexion->prepare($cmd);
        $request->bind_param("ssssssssss", $nom, $prenom, $email, $token, $salle, $genre, $datenaissance, $ville, $taille, $poid);
        $request->execute();
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