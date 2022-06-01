<?php

    $db_connexion = db_login();

    if($db_connexion->connect_error)
        die('Erreur : ' .$conn->connect_error);


    function get_all_faq($db_connexion){
        $request = $db_connexion->prepare("SELECT * FROM faq");
        
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_all(MYSQLI_ASSOC);

        return $row;
    }

    function get_question_from_id($db_connexion, $id){
        $request = $db_connexion->prepare("SELECT * FROM faq WHERE ID = ?");
        $request->bind_param("s", $id);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();

        return $row;
    }

    function update_question_from_id($db_connexion, $id, $titre, $contenu){
        $cmd = "UPDATE `faq`
        SET `TITRE` = ?, `CONTENU`=?
        WHERE ID = ?";
        $request = $db_connexion->prepare($cmd);
        $request->bind_param("sss", $titre, $contenu, $id);
        $request->execute();
    }


    function add_question($db_connexion, $titre, $contenu){
        $request = $db_connexion->prepare("INSERT INTO `faq`(`TITRE`, `CONTENU`) VALUES (?, ?)");
        $request->bind_param("ss", $titre, $contenu);
    
        $request->execute();
    }

    function delete_question($db_connexion, $id){
        $request = $db_connexion->prepare("DELETE FROM `faq` WHERE ID=?");
        $request->bind_param("s", $id);
    
        $request->execute();
    }


?>