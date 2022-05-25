<?php
    

    function db_login(){
        $servername = 'herogu.garageisep.com';
        $sql_username = 'LUaXoYFlac_iclald';
        $sql_password = 'FAbkJpMy3Zz1H1Es';

        $db_name = 'Y3Xm1BKQRq_iclald';

        $connexion = new mysqli($servername, $sql_username, $sql_password, $db_name);


        if($connexion->connect_error){
            die('Erreur : ' .$conn->connect_error);
        }

        return $connexion;
    }


?>