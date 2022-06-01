<?php
    session_start();

    require_once( __DIR__ .  "/../model/db_connexion.php");
    require_once( __DIR__ .  "/password_lib.php");
    require_once( __DIR__ .  "/../model/connexionModel.php");

    //Si les valeurs ne sont pas Set, on affiche la page, sinon on connecte
    if(isset( $_POST['password'] ) && isset($_POST['email'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $hash = password_hash($password, PASSWORD_BCRYPT);

        if (is_user_registred($db_connexion, $email, $password)) {
            $_SESSION['connected'] = TRUE;
            $_SESSION['email'] = $email;
            $_SESSION['nom'] = get_from_user($db_connexion, $email, 'NOM');
            $_SESSION['prenom'] = get_from_user($db_connexion, $email, 'PRENOM');
            $_SESSION['salle'] = get_from_user($db_connexion, $email, 'SALLE');
            $_SESSION['role'] = get_from_user($db_connexion, $email, 'ROLE');

            update_dernier_acces($db_connexion, $email);

            header('Location: ./'); die();
            //include(__DIR__ . "\..\\view\\page-acceuil.php");
        }
        else{
            $error = "Nom d'utilisateur ou mot de passe Invalid, veuillez réessayer.";
            include(__DIR__ . "/../view/authView.php");

        }
    }

    else{
        //include(__DIR__ . "/../view/connexionView.html");

        include(__DIR__ . "/../view/authView.php");

    }


?>