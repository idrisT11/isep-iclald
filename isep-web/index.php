<?php

    $request = $_SERVER['REQUEST_URI'];
    $qr = $_SERVER['QUERY_STRING'];

    $origin = '/isep-web/'; 

    $date1 = date('Y-m-d'); // Date du jour
    setlocale(LC_TIME, "fr_FR", "French");
    $datum = ucfirst(strftime("%A %d %B %G", strtotime($date1)));

    if ($request == $origin . 'connexion') {
        require __DIR__ . '/control/connexion.php';
    }

    else if ($request == $origin . 'deconnexion') {
        require __DIR__ . '/control/deconnexion.php';
    }

    else if ($request == $origin . 'register') {
        require __DIR__ . '/control/register.php';
    }

    else if (preg_match('/\/isep-web\/manage_user/i' , $request)) {
        require __DIR__ . '/control/manage_user.php';
     
    }
    
    else if (preg_match('/\/isep-web\/terme/i' , $request)) {
        require __DIR__ . '/control/terme.php';
     
    }

    else if (preg_match('/\/isep-web\/admin/i' , $request)) {
        require __DIR__ . '/control/admin.php';
     
    }

    else if (preg_match('/\/isep-web\/messages-admin/i' , $request)) {
        require __DIR__ . '/control/quick_message_admin.php';
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

    else if (preg_match('/\/isep-web\/faq/i' , $request)) {
        require __DIR__ . '/control/faq.php';
     
    }
    
    else if (preg_match('/\/isep-web\/ticket/i' , $request)) {
        require __DIR__ . '/control/ticket.php';
     
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