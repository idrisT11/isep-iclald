<?php
    session_start();
    require_once( __DIR__ .  "\..\model\\profilPicModel.php");

    if(isset($_SESSION['connected']) && $_SESSION['connected'])
    {
        $email = $_SESSION['email'];
        $token = get_token_from_email($db_connexion, $email);

        var_dump($_FILES['picInput']);

        if (isset($_FILES['picInput']) && $_FILES['picInput']['size'] < 1024*1024 && $_FILES['picInput']['size'] != 0) 
        {
            $file_path = chargeImage($token, $_FILES['picInput']['tmp_name']);
            $_SESSION['profil_pic'] = $file_path;

        }
        
        header('Location: /isep-web/profil');

    }


?>