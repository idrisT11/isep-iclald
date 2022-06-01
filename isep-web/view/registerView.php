<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/fonts/font.css">
    <title>Health's Fab - Inscription</title>
</head>
<body>
    <main>

        <div id="inscriptionPanel">
            <div class="carre_wesh" id="carre_haut_gauche"> </div>
            <div class="carre_wesh" id="carre_haut_droit"> </div>
            <div class="carre_wesh" id="carre_bas_gauche"> </div>
            <div class="carre_wesh" id="carre_bas_droit"> </div>

            <h1>Inscription</h1>
            <div id="error">
        
            </div>
            <form action="./register" method="post">
                
                <div class="formElem">
                    <input type="email" name="username" id="username" placeholder="E-mail...">
                </div>
                <div class="formElem">                
                    <input type="password" name="password" id="password" placeholder="Mot de passe...">
                </div>
                <div class="formElem">
                    <input type="password" name="conf_password" id="conf_password"placeholder="Confirmation mot de passe...">
                </div>
                
                
                <div class="formElem">
                    <a href="./connexion">Vous avez déja un compte ? Connectez vous</a>
                </div>
                

                <div class="formSub">
                    <input type="submit" value="Entrer" id="submit" class="submitOff">
                </div>

            </form>
        </div>

        <div id="overlay" style="display: <?php if(isset($error)) {echo'flex';} else {echo 'none';} ?>;">
            <div>
                <div style="text-align: right;" onclick="hideOverlay()">
                    ✖
                </div>
                <div>
                    Error: <br> <em><?= isset($error)?$error: '' ?></em>
                </div>
            </div>

        </div>

    </main>


    <script>
        let errorElem = document.getElementById('error'),
            email = document.getElementById('username'),
            password = document.getElementById('password');

        let submit = document.getElementById('submit');

        let emailAllowSubmit = false,
            passwordAllowSubmit = false;
        
        function hideOverlay() {
            document.getElementById('overlay').style.display = 'none';
        }
    </script>


    <style>

        #overlay{
            background-color: #0008;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;

            justify-content: center;
            align-items: center;
            flex-direction: column;

            font-size: 30px;
            font-family: Exo-ExtraLight;
            color: #333;
        }

        #overlay>div{
            width: 400px;
            background-color: #EEE;
            border-radius: 5px;
            padding: 40px;
        }

        #overlay>em{
            font-size:14px;
        }  
        
        .submitOff, .submitOn{
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 7px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            width: 50%;

            backdrop-filter: blur(12px);
            border: 0;

            font-size: 17px;
            padding: 5px;
            margin: 15px;

            cursor: pointer;
        }

        body, html{
            margin: 0;
            padding: 0;
            height: 100%;
        }
    

        main{
            background: linear-gradient(45deg, #80ff72, #7ee8fa);
            margin: 0;
            height: 100%;

            display: flex;

            justify-content: center;
            align-items: center;   
        }

        @media only screen and (min-width: 800px) {
            

            #inscriptionPanel{
                background-color: rgba(240, 240, 240, 0.20);
                border-radius: 7px;
                box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);

                width: 18%;
                height: 400px;
                padding: 20px;

                backdrop-filter: blur(16px);

            }

            #inscriptionPanel h1{
                font-family: Exo-ExtraLight;
                text-align: center;
                color: #444;
            }

            .formElem {
                text-align: center;
            }

            .formElem input{
                background-color: rgba(255, 255, 255, 0.3);
                border-radius: 7px;
                box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
                width: 80%;

                backdrop-filter: blur(12px);
                border: 0;

                font-size: 16px;
                padding: 8px;
                margin: 15px;

                font-family: Exo-ExtraLight;
                
            }

            .formElem a {
                display: block;
                font-size: 14px;
                padding: 5px;
                margin: 17px;
                text-align: center;   

                color: #444;

                font-family: Exo-Light-Italic;
                text-decoration: none;

            }
            
            .formSub{
                text-align: center;
        
            }

            .carre_wesh{
                background-color: rgba(255, 255, 255, 0.3);
                border-radius: 11px;
                box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
                backdrop-filter: blur(12px);

                position: absolute;
                margin: 0;
                clear:both;


            }

            #carre_haut_gauche{
                min-width: 60px;
                min-height: 60px;

                transform: translate(-100%, -100%);
                animation: rotatus1 1s ease-in;
            }

            #carre_haut_droit{
                min-width: 75px;
                min-height: 75px;
                right: 0;
                top: 0;

                transform: translate(65%, -65%);
                animation: rotatus2 1s ease-in;
            }

            #carre_bas_droit{
                min-width: 60px;
                min-height: 60px;
                right: 0;
                bottom: 0;

                transform: translate(50%, 50%);
                animation: rotatus3 1s ease-in;
            }

            #carre_bas_gauche{
                min-width: 80px;
                min-height: 80px;
                left: 0;
                bottom: 0;

                transform: translate(-50%, 50%);
                animation: rotatus4 1s ease-in;

            }
        }

        @media only screen and (max-width: 800px) {

            #inscriptionPanel{
                background-color: rgba(240, 240, 240, 0.20);
                border-radius: 7px;
                box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);

                width: 85%;
                height: 400px;
                padding: 10px;

                backdrop-filter: blur(16px);

            }

            #inscriptionPanel h1{
                font-family: Exo-ExtraLight;
                text-align: center;
                color: #444;
            }

            .formElem {
                text-align: center;
            }

            .formElem input{
                background-color: rgba(255, 255, 255, 0.3);
                border-radius: 7px;
                box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
                width: 80%;

                backdrop-filter: blur(12px);
                border: 0;

                font-size: 16px;
                padding: 8px;
                margin: 15px;

                font-family: Exo-ExtraLight;
                
            }

            .formElem a {
                display: block;
                font-size: 14px;
                padding: 5px;
                margin: 17px;
                text-align: center;   

                color: #444;

                font-family: Exo-Light-Italic;
                text-decoration: none;

            }
            
            .formSub{
                text-align: center;
        
            }

            .carre_wesh{
                background-color: rgba(255, 255, 255, 0.3);
                border-radius: 11px;
                box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
                backdrop-filter: blur(12px);

                position: absolute;
                margin: 0;
                clear:both;


            }

            #carre_haut_gauche{
                min-width: 40px;
                min-height: 40px;

                transform: translate(-100%, -100%);
                animation: rotatus1 1s ease-in;
                display: none;

            }

            #carre_haut_droit{
                min-width: 45px;
                min-height: 45px;
                right: 0;
                top: 0;

                transform: translate(65%, -65%);
                animation: rotatus2 1s ease-in;
                display: none;

            }

            #carre_bas_droit{
                min-width: 40px;
                min-height: 40px;
                right: 0;
                bottom: 0;

                transform: translate(50%, 50%);
                animation: rotatus3 1s ease-in;
                display: none;

            }

            #carre_bas_gauche{
                min-width: 50px;
                min-height: 50px;
                left: 0;
                bottom: 0;

                transform: translate(-50%, 50%);
                animation: rotatus4 1s ease-in;
                display: none;
            }
        }



        @keyframes rotatus1 {
            from{
                transform: rotate(-30deg) translate(0, 0);
            }

            to{
                transform: rotate(0deg) translate(-100%, -100%);
            }
        }

        @keyframes rotatus2 {
            from{
                transform: rotate(50deg) translate(0, 0);
            }

            to{
                transform: rotate(0deg) translate(65%, -65%);
            }
        }


        @keyframes rotatus3 {
            from{
                transform: rotate(50deg) translate(0, 0);
            }

            to{
                transform: rotate(0deg) translate(50%, 50%);
            }
        }

        @keyframes rotatus4 {
            from{
                transform: rotate(-30deg) translate(0, 0);
            }

            to{
                transform: rotate(0deg) translate(-50%, 50%);
            }
        }





    </style>
</body>
</html>