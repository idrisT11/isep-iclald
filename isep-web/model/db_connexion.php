<?php

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