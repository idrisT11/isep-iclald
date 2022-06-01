<?php
    session_start();
    require_once( __DIR__ .  "/../model/db_connexion.php");
    require_once( __DIR__ .  "/../model/ticketModel.php");

    if (isset($_SESSION['connected']) && $_SESSION['connected'] && $_SESSION['role'] == 1) {

        if (isset($_GET['action'])) 
        {
            if ($_GET['action'] == 'add' && isset($_GET['contenu']) && isset($_GET['titre'])) 
            {
                $email = $_SESSION['email'];
                $id = get_id_from_email($db_connexion, $email);
                $contenu = $_GET['contenu'];
                $titre = $_GET['titre'];

                add_ticket($db_connexion, $id, $titre, $contenu);

                header('Location: ./ticket');
            }

            else if ($_GET['action'] == 'delete' && isset($_GET['ticket_id'])) 
            {
                $email = $_SESSION['email'];
                $user = get_id_from_email($db_connexion, $email);
                $id = $_GET['ticket_id'];

                if (isOwner($db_connexion, $id, $user)) 
                    delete_ticket($db_connexion, $id);
                
                header('Location: ./ticket');
            }
    
            else if ( $_GET['action'] == 'mark' && isset($_GET['ticket_id']) && isset($_GET['state']) ) 
            {
                $email = $_SESSION['email'];
                $user = get_id_from_email($db_connexion, $email);
                $id = $_GET['ticket_id'];
                $state = $_GET['state'];

                if (isOwner($db_connexion, $id, $user)) 
                    set_state_ticket($db_connexion, $id, $state);
                    
                header('Location: ./ticket');
            }

            else if ($_GET['action'] == 'respond' && isset($_GET['ticket_id']) && isset($_GET['reponse'])) {
                $token = get_token_from_email($db_connexion, $_SESSION['email']);
                $nom = $_SESSION['nom'];
                $prenom = $_SESSION['prenom'];
                $content = $_GET['reponse'];

                add_to_conversation($db_connexion, $_GET['ticket_id'], $token, $nom, $prenom, $content);

                header('Location: ./ticket?ticket_id=' . $_GET['ticket_id']);
            }
            
        }

        if (isset($_GET['new'])) 
        {   
            include(__DIR__ . "/../view/ticketAdd.php");

        }

        elseif ( isset($_GET['ticket_id']) ) {
            $id = $_GET['ticket_id'];
            $ticket = get_ticket_from_id($db_connexion, $id);
            $username = get_name_from_id($db_connexion, $ticket['USER']);
            $email = get_email_from_id($db_connexion, $ticket['USER']);

            list($sign, $sign_afficher) = get_sign($ticket);


            include(__DIR__ . "/../view/ticketConvView.php");
        }

        #Sinon on renvoie la page
        else{

            $email = $_SESSION['email'];
            $id = get_id_from_email($db_connexion, $email);
            $tickets = get_all_tickets_from_user($db_connexion, $id);

            include(__DIR__ . "/../view/ticketView.php");
        }

    }

    else if (isset($_SESSION['connected']) && $_SESSION['connected'] && $_SESSION['role'] == 2) {
        
        if (isset($_GET['action'])) 
        {
            if ($_GET['action'] == 'delete' && isset($_GET['ticket_id'])) 
            {
                $id = $_GET['ticket_id'];

                delete_ticket($db_connexion, $id);
                header('Location: ./admin/ticket');
            }

            else if ( $_GET['action'] == 'mark' && isset($_GET['ticket_id']) && isset($_GET['state']) ) 
            {
                $id = $_GET['ticket_id'];
                $state = $_GET['state'];

                set_state_ticket($db_connexion, $id, $state);
                header('Location: ./admin/ticket');
            }

            else if ($_GET['action'] == 'respond' && isset($_GET['ticket_id']) && isset($_GET['reponse'])) {
                $token = get_token_from_email($db_connexion, $_SESSION['email']);
                $nom = $_SESSION['nom'];
                $prenom = $_SESSION['prenom'];
                $content = $_GET['reponse'];


                add_to_conversation($db_connexion, $_GET['ticket_id'], $token, $nom, $prenom, $content);

                header('Location: ./admin/ticket?ticket_id=' . $_GET['ticket_id']);
            }
        }

        elseif ( isset($_GET['ticket_id']) ) {
            $id = $_GET['ticket_id'];
            $id = $_GET['ticket_id'];
            $ticket = get_ticket_from_id($db_connexion, $id);
            $username = get_name_from_id($db_connexion, $ticket['USER']);
            $email = get_email_from_id($db_connexion, $ticket['USER']);

            list($sign, $sign_afficher) = get_sign($ticket);

            include(__DIR__ . "/../view/ticketConvView.php");
        }

        #Sinon on renvoie la page
        else{

            $email = $_SESSION['email'];
            $id = get_id_from_email($db_connexion, $email);

            if (isset($_GET['open-only'])) 
                $tickets = get_open_tickets($db_connexion, $id);
            
            else
                $tickets = get_all_tickets($db_connexion, $id);

            include(__DIR__ . "/../view/ticketAdminView.php");
        }

    }

    else{
        echo "??";
        echo "Vous n'avez pas accès à cette page";
        ?>
            <a href="./">Revenir à l'acceuil</a>
        <?php
    }



    function get_sign($ticket){
        switch ($ticket['ETAT']) {
            case '0':
                $sign = 'closed';
                $sign_afficher = 'Fermé';
                break;
            case '1':
                $sign = 'open';
                $sign_afficher = 'Ouvert';
                break;
            case '2':
                $sign = 'resolved';
                $sign_afficher = 'Resolue';
                break;
            
        }

        return array($sign, $sign_afficher);
    }

?>