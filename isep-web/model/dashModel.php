<?php
    $db_connexion = db_login();

    if($db_connexion->connect_error)
        die('Erreur : ' .$conn->connect_error);

    function get_lumi_from_salle($db_connexion, $salle)
    {
        $request = $db_connexion->prepare("SELECT * FROM salle WHERE NUMERO = ?");
        
        $request->bind_param("s", $salle);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();
        $lumni = $row["LUMINOSITE"];

        return $lumni;
    }

    function get_seuil_from_salle($db_connexion, $salle)
    {
        $request = $db_connexion->prepare("SELECT * FROM salle WHERE NUMERO = ?");
        
        $request->bind_param("s", $salle);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();
        $lumni = $row["DECIBEL"];

        return $lumni;
    }


    //=======================================================================================


    function set_lumi_from_salle($db_connexion, $salle, $lumni)
    {
        $request = $db_connexion->prepare("UPDATE salle SET LUMINOSITE = ? WHERE NUMERO = ?");
        
        $request->bind_param("ss", $lumni, $salle);
        $request->execute();
        $result = $request->get_result(); 
    }

    function set_seuil_from_salle($db_connexion, $salle, $deci)
    {
        $request = $db_connexion->prepare("UPDATE salle SET DECIBEL = ? WHERE NUMERO = ?");
        
        $request->bind_param("ss", $deci, $salle);
        $request->execute();
        $result = $request->get_result(); 
    }

?>

