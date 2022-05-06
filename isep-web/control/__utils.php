<?php
    function isEmailValid($email)
    {
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 

        return preg_match($regex, $email);
    }

    function isPasswordValid($password)
    {
        if ( strlen( $password ) >= 4 &&  strlen( $password ) <= 40) {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function sendConfirmationMail($to_email, $link)
    {
        $subject = "Validation du compte Health's Fab";
        $body = "Bonjour,\n\n \tVoici le lien de validitation de votre compte <a href='".$link."'>Ici</a>";
        $headers = "From: Health's Fab" . "\r\n" ;
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    
        
        if (mail($to_email, $subject, $body, $headers)) {
            echo "Email successfully sent to $to_email...";

        } 
        else {
            echo "Email sending failed...";

        }
    }

    function sendMail($titre, $contenu, $to_email)
    {
        $subject = $titre;
        $body = $contenu;
        $headers = "From: Health's Fab" . "\r\n" ;
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    
        
        if (mail($to_email, $subject, $body, $headers)) {
            echo "Email successfully sent to $to_email...";

        } 
        else {
            echo "Email sending failed...";

        }
    }
    

?>