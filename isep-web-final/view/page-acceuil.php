<?php



?>


<html>

<head>
    <title>accueil-page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./static/style/page-acceuil.css">
    <link rel="stylesheet" href="./static/style/chat.css">
</head>

<body>
    <!--
<div id="div1">
    <header id="header"  >
        <div id="dov" >
                <!--

                <div id="connexionbtn">
                        <form action="connexion" method="post">
                            <input type="submit" value="connexion" class="btn2"  >
                        </form>
                </div>

                <div id="photo_profil">
                    <a href="profil">
                        <img  src="<?php echo $_SESSION['profil_pic']; ?>" width="150px" height="150px"/>
                    </a>
                </div>


                <nav>

                    <ul>
                        <li><a href="/">Acceuil</a></li>
                        <li><a href="#">Vos resultats</a></li>
                        <li><a href="carte-pollution.html">Carte Pollution</a></li>
                        <li><a href="accueil-forum.html">Forum</a></li>
                        <li><a href="#">Nous Contacter</a></li>
                    </ul>

                </nav>
            <div id="im" class="im">
                <img src="./static/image/IM.png" alt="im" height="120" width="120">
            </div>
        </div>

    </header>


<div>
    <div id="titre">
         <div id="text1">
             <h1 style="text-align: right" :>Health's FAB. <br></h1>
             <p style="text-align: right">Travaillons dans les meilleures conditions</p>
        </div>
    </div>

    <div id="suite">
        <p >Retrouver toutes vos informations <br>sur notre site web et notre
            application<br></p>

    </div>
    </div>
</div>
</div>
<footer >

    <div class="div2">
        <div >
        <h1>Nous contacter</h1>
        <ul>
            <li>q1</li>
            <li>q1</li>
            <li>q1</li>
            <li>q1</li>
        </ul>

    </div>
    <div id="test">
        <h1 class="list">Notre adresse</h1>
        <ul>
            <li>q1</li>
            <li>q1</li>
            <li>q1</li>
            <li>q1</li>
        </ul>

    </div><div >
    <h1>Nos réseaux sociaux</h1>
    <ul class="list">
        <li>q1</li>
        <li>q1</li>
        <li>q1</li>
        <li>q1</li>
    </ul>
    </div>
    </div>
        <div class="div2">
            <p><i>Cookies</p>
            <p ><i>Cookies</p>
            <p ><i>@2022 Site officiel</p>
        </div>




</footer>
    -->
    <!--###################___CHAT___#######################-->
    <div id="chat_conteneur">
        <div id="header_conteneur">
            <img src="./static/image/X.png" alt="go back" width="19px" height="19px" id="quit_chat">
        </div>
        <div id="message_conteneur">

            <div class="user_message_conteneur">
                <div class="user_message">
                    Bonjour 
                </div>
                <img src="<?php echo $_SESSION['profil_pic']; ?>" width="48px" height="48px" class="user_pic">
            </div>

            <div class="admin_message_conteneur">
                <img src="./static/image/admin.png" width="48px" height="48px" class="admin_pic">
                <div class="admin_message">
                    Bonjour Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque expedita minima nihil cupiditate, quos porro eum nisi aliquam nulla tempore unde commodi earum doloremque! Omnis fuga beatae eligendi suscipit esse.
                </div>
            </div>
        </div>

        <div id="input_conteneur">

            <input type="text" placeholder="Entrez votre message" id="input_chat">

            <div id="send_button">
                <img src="./static/image/send.png" alt="send" width="24px" height="24px">
            </div>
        </div>
        
        <input type="hidden" value="<?php echo $_SESSION['profil_pic']; ?>" id="user_pic_src">
        <script src="./static/script/chat.js"></script>

    </div>

</body>
