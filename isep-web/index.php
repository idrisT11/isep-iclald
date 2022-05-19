<?php
    echo 55;
    die();
    
    $request = $_SERVER['REQUEST_URI'];
    $qr = $_SERVER['QUERY_STRING'];

    $origin = '/isep-web/'; 


    if ($request == $origin . 'connexion') {
        require __DIR__ . '/control/connexion.php';
    }

    else if ($request == $origin . 'deconnexion') {
        require __DIR__ . '/control/deconnexion.php';
    }

    else if ($request == $origin . 'register') {
        require __DIR__ . '/control/register.php';
    }

    else if ($request == $origin . 'messages-admin') {
        require __DIR__ . '/control/quick_message_admin.php';
    }

    else if (preg_match('/\/isep-web\/admin/i' , $request)) {
        require __DIR__ . '/control/manage_user.php';
     
    }

    else if (preg_match('/\/isep-web\/add-user/i' , $request)) {
        require __DIR__ . '/control/add_user.php';
     
    }

    else if (preg_match('/\/isep-web\/verify/i' , $request)) {
        require __DIR__ . '/control/verify.php';
     
    }

    else if (preg_match('/\/isep-web\/contacter/i' , $request)) {
        require __DIR__ . '/control/contacter.php';
     
    }

    else if (preg_match('/\/isep-web\/quick_message(.)*/i' , $request)) {
        require __DIR__ . '/control/quick_message.php';
     
    }

    else if (preg_match('/\/isep-web\/changeProfilPic/i' , $request)) {
        require __DIR__ . '/control/change_profil_pic.php';
     
    }

    elseif (preg_match('/\/profils-search/i' , $request)) {
        require __DIR__ . '/control/profil_search.php';
    }

    else if (preg_match('/\/isep-web\/profil/i' , $request)) {
        require __DIR__ . '/control/profil.php';
     
    }

    else if (preg_match('/\/isep-web\/forum/i' , $request)) {
        require __DIR__ . '/control/forum.php';
     
    }

    else if (preg_match('/\/isep-web\/dash/i' , $request)) {
        require __DIR__ . '/control/dashboard.php';
     
    }


    else if (preg_match('/\/isep-web\/map/i' , $request)) {
        require __DIR__ . '/control/map.php';
     
    }


    else if ($request == $origin . '') {
        require __DIR__ . '/control/acceuil.php';
    }

    else{
        http_response_code(404);
    }



?>