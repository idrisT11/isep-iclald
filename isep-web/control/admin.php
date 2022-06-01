<?php


    session_start();

    //The user has to been connected and has to be an admin to access this page
    if (!(isset($_SESSION['connected']) && $_SESSION['connected']) || $_SESSION['role'] != 2) {
        echo "You dont have access to this page";
        die();
    }

    session_abort();


    if (isset($_GET['users'])) {
        include(__DIR__ . "/manage_user.php");  
    }

    else if (isset($_GET['add-user'])) {
        include(__DIR__ . "/add_user.php");  
    }

    else if (isset($_GET['faq'])) {
        include(__DIR__ . "/faq.php");  
    }

    else if (isset($_GET['ticket'])) {
        include(__DIR__ . "/ticket.php");  
    }
    
    else
        include(__DIR__ . "/../view/adminPanel.php");
    


?>