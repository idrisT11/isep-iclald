<?php
    $db_connexion = db_login();

    if($db_connexion->connect_error)
        die('Erreur : ' .$conn->connect_error);



        //On n'a pas verifier l'existance de la value
        
    function get_moyenne_bled($db_connexion, $pays){
        $request = $db_connexion->prepare("SELECT * FROM countries WHERE NAME = ?");
        
        $request->bind_param("s", $pays);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();
        $verified = $row["MOYENNE"];

        return $verified;
    }

    function get_moyenne_ville($db_connexion, $ville){
        $request = $db_connexion->prepare("SELECT * FROM cities WHERE NAME = ?");
        
        $request->bind_param("s", $ville);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();
        $verified = $row["VALUE"];

        return $verified;
    }

    function get_graph_bled($db_connexion, $pays){
        $request = $db_connexion->prepare("SELECT * FROM countries WHERE NAME = ?");
        
        $request->bind_param("s", $pays);
        $request->execute();
        $result = $request->get_result(); 

        $row = $result->fetch_assoc();
        $verified = $row["ANNUELLE"];

        return $verified;
    }



?>