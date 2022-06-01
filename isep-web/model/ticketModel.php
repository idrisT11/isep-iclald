<?php

    $db_connexion = db_login();

    if($db_connexion->connect_error)
        die('Erreur : ' .$conn->connect_error);


    function get_all_tickets($db_connexion){
        $request = $db_connexion->prepare("SELECT * FROM ticket");
        
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_all(MYSQLI_ASSOC);

        return $row;
    }
    
    function get_open_tickets($db_connexion){
        $request = $db_connexion->prepare("SELECT * FROM ticket WHERE ETAT = 1");
        
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_all(MYSQLI_ASSOC);

        return $row;
    }

    function get_all_tickets_from_user($db_connexion, $id){
        $request = $db_connexion->prepare("SELECT * FROM ticket WHERE USER = ?");
        $request->bind_param("s", $id);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_all(MYSQLI_ASSOC);

        return $row;
    }

    function get_ticket_from_id($db_connexion, $id){
        $request = $db_connexion->prepare("SELECT * FROM ticket WHERE ID = ?");
        $request->bind_param("s", $id);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();

        return $row;
    }

    function set_state_ticket($db_connexion, $id, $state){
        $cmd = "UPDATE `ticket`
        SET `ETAT` = ?
        WHERE ID = ?";
        $request = $db_connexion->prepare($cmd);
        $request->bind_param("ss", $state, $id);
        $request->execute();
    }

    function isOwner($db_connexion, $id, $user)
    {
        $request = $db_connexion->prepare("SELECT * FROM ticket WHERE ID = ?");
        $request->bind_param("s", $id);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();    
        
        return ($row['USER'] == $user);
    }

    function update_ticket_from_id($db_connexion, $id, $titre, $contenu){
        $cmd = "UPDATE `faq`
        SET `TITRE` = ?, `CONTENU`=?
        WHERE ID = ?";
        $request = $db_connexion->prepare($cmd);
        $request->bind_param("sss", $titre, $contenu, $id);
        $request->execute();
    }


    function add_ticket($db_connexion, $user, $titre, $contenu){
        $req = "INSERT INTO ticket(TITRE, CONTENU, ETAT, CONVERSATION, USER) VALUES(?, ?, 1, '[]',?)";
        $request = $db_connexion->prepare($req);
        $request->bind_param("sss", $titre, $contenu, $user);
    
        $request->execute();
    }

    function delete_ticket($db_connexion, $id){
        $request = $db_connexion->prepare("DELETE FROM `ticket` WHERE ID=?");
        $request->bind_param("s", $id);
    
        $request->execute();
    }


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

    function get_profil_pic_from_token($token){

        if ( file_exists('./static/image/profil_pic/'.$token.'.png') ) {
            return '/isep-web/static/image/profil_pic/'.$token.'.png';
        }
        else{
            return '/isep-web/static/image/profil_pic/default.png';
        }
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

    function get_name_from_id($db_connexion, $id){
        $request = $db_connexion->prepare("SELECT * FROM users WHERE ID = ?");
        
        $request->bind_param("s", $id);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();
        $name = $row["NOM"] . ' ' . $row['PRENOM'];

        return $name;
    }

    function get_email_from_id($db_connexion, $id){
        $request = $db_connexion->prepare("SELECT * FROM users WHERE ID = ?");
        
        $request->bind_param("s", $id);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();
        $email = $row["EMAIL"];

        return $email;
    }

    
    function add_to_conversation($db_connexion, $id, $token, $nom, $prenom, $content)
    {
        setlocale(LC_TIME, "fr_FR");
        
        $request = $db_connexion->prepare("SELECT CONVERSATION FROM ticket WHERE ID = ?");
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
        $request = $db_connexion->prepare("UPDATE ticket SET CONVERSATION = ? WHERE ID = ?");
        $request->bind_param("ss", $conversation_str, $id);
        $request->execute();
    }

    

?>