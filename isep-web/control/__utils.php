<?php
    function isEmailValid($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function isPasswordValid($password)
    {
        $maj = '@[A-Z]@'; 
        $min = '@[a-z]@'; 
        $chi = '@[0-9]@'; 
        if ( preg_match($chi, $password) && preg_match($maj, $password) && preg_match($min, $password) && strlen( $password ) >= 8 &&  strlen( $password ) <= 40) {
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
        $body = "Bonjour,/n/n /tVoici le lien de validitation de votre compte <a href='".$link."'>Ici</a>";
        $headers = "From: Health's Fab" . "/r/n" ;
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
        $headers = "From: health.fab@vgath.site" . "\r\n" ;
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    
        
        if (mail($to_email, $subject, $body, $headers)) {
            echo "Email successfully sent to $to_email...";

        } 
        else {
            echo "Email sending failed...";

        }
    }
    

?>