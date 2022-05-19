<?php
    echo 55;

    $request = $_SERVER['REQUEST_URI'];
    $qr = $_SERVER['QUERY_STRING'];

    $origin = ''; 


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

    else if (preg_match('/admin/i' , $request)) {
        require __DIR__ . '/control/manage_user.php';
     
    }

    else if (preg_match('/add-user/i' , $request)) {
        require __DIR__ . '/control/add_user.php';
     
    }

    else if (preg_match('/verify/i' , $request)) {
        require __DIR__ . '/control/verify.php';
     
    }

    else if (preg_match('/contacter/i' , $request)) {
        require __DIR__ . '/control/contacter.php';
     
    }

    else if (preg_match('/quick_message(.)*/i' , $request)) {
        require __DIR__ . '/control/quick_message.php';
     
    }

    else if (preg_match('/changeProfilPic/i' , $request)) {
        require __DIR__ . '/control/change_profil_pic.php';
     
    }

    elseif (preg_match('/\/profils-search/i' , $request)) {
        require __DIR__ . '/control/profil_search.php';
    }

    else if (preg_match('/profil/i' , $request)) {
        require __DIR__ . '/control/profil.php';
     
    }

    else if (preg_match('/forum/i' , $request)) {
        require __DIR__ . '/control/forum.php';
     
    }

    else if (preg_match('/dash/i' , $request)) {
        require __DIR__ . '/control/dashboard.php';
     
    }


    else if (preg_match('/\/map/i' , $request)) {
        require __DIR__ . '/control/map.php';
     
    }


    else if ($request == $origin . '') {
        
        require __DIR__ . '/control/acceuil.php';
    }

    else{
        echo $request.'<br>';
        echo $origin . '';

        //http_response_code(404);
    }



?>