<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./static/style/admin.css" media="(min-width: 950px)">
    <link rel="stylesheet" href="./static/fonts/font.css">
    <link rel="stylesheet" href="./static/fonts/chat.css">

    <title>Administrateur</title>
</head>
<body>
    <div id="window">
        <nav>
            <img src="./static/image/IM.png" width="50px" style="position: absolute">
            <div id="nav_ctn">

                <a href="./" class="nav_link">
                    <img src="./static/image/home.png" alt="home">
                </a>

                <a href="./dash" class="nav_link">
                    <img src="./static/image/graph.png" alt="dashboard">
                </a>

                <a href="./forum" class="nav_link">
                    <img src="./static/image/forum.png" alt="forum">
                </a>
                
                <a href="./map" class="nav_link">
                    <img src="./static/image/map.png" alt="map">
                </a>

                <?php
                    if ($_SESSION['role'] == 1) {
                ?>
                    <a href="./ticket" class="nav_link">
                        <img src="./static/image/ticket.svg" alt="map">
                    </a>
                <?php
                    }
                ?>
                      
            </div>
        </nav>

        <main>
            
            <div id="header">
                <div id="header_title">
                    <h1>Administrateur</h1> 
                    <p><?=$datum?></p> 
                </div>

                <?php include(__DIR__ . '/_header.php'); ?>
            </div>

            <section id="content">

                <div id="content_header">
                    <h1 id="title_content">
                        Bienvenue <?php echo $_SESSION['nom'].' '.$_SESSION['prenom']?>, vous pouvez accèder ici aux diffrentes pages d'administration   |
                    </h1>

                    <a href="./" id="configure_link">
                        Retour
                    </a>
                </div>
                <div id="panel_ctn">

                    <a class="panel" href="./admin/users">
                        <img src="./static/image/users.svg" alt="inactive" width="230px">
                        <br>
                        <br>
                        <div>Gestion des utilisateurs</div>
                    </a>

                    <a class="panel" href="./admin/acceuil-faq">
                        <img src="./static/image/faqs.svg" alt="inactive" width="230px">
                        <br>
                        <br>
                        <div>Gestion de la FAQ</div>
                    </a>

                    <a class="panel" href="./admin/ticket">
                        <img src="./static/image/ticket.svg" alt="inactive" width="230px">
                        <br>
                        <br>
                        <div>Gestion des tickets</div>
                </a>

                </div>


                


            </section>
        </main>

            

    </div>

    <script>
        var btn = document.getElementById('nom_btn'),
            pop_down = document.getElementById('deco_pop_down');
        var displayed = false;
        btn.onclick = ()=>{
            if (displayed) {
                pop_down.style.display = 'none';
                
            } else {
                pop_down.style.display = 'flex';
            }
            displayed = !displayed;
        }
    </script>


    <!--<script src="./static/script/acceuil.js"></script>-->

</body>
</html>