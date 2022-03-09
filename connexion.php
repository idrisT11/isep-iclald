<?php
    session_start();

    require_once("./password_lib.php");

    if (isset( $_POST['password'] ) && isset($_POST['username'])) {

        $db_connexion = db_login();

        $username = $_POST['username'];
        $password = $_POST['password'];


        $hash = password_hash($password, PASSWORD_BCRYPT);


        $requette = $db_connexion->prepare("SELECT * FROM users WHERE email = ?");
        $requette->bind_param("s", $username);
        $requette->execute();
        $result = $requette->get_result();


        if ($requette->affected_rows == 1) 
        {
            $row = $result->fetch_assoc();
            $hash_db = $row["password"];

            if (password_verify($password, $hash)) 
            {

                $_SESSION["connected"] = true;
                $_SESSION["name"] = $row["name"];



                 header("Location: acceuil.php");
                
            }
        }
        else{

        }
    }
    else{
        header('Location: connexion.html?cnx_error=1');
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