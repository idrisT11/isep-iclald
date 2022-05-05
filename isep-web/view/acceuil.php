<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./static/style/acceuil.css">
    <link rel="stylesheet" href="./static/fonts/font.css">
    <link rel="stylesheet" href="./static/fonts/chat.css">

    <title>Acceuil</title>
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
                      
            </div>
        </nav>

        <main>
            
            <div id="header">
                <div id="header_title">
                    <h1>Acceuil</h1> 
                    <p>Samedi 30 avril 2022</p> 
                </div>

                <?php include(__DIR__ . './_header.php'); ?>
            </div>

            <section id="content">
                <div id="content_header">
                    <h1 id="title_content">
                        Bienvenue <?php echo $_SESSION['nom'].' '.$_SESSION['prenom']?> :
                    </h1>

                    <a href="#" id="configure_link">
                         ➽
                    </a>
                </div>

                <form method="GET" action="profils-search">
                    <h1>Vous recherchez quelqu'un ? Allez-y !</h1>
                    <div id="recherche">
                        <input type="text" id="recherche_input" name="recherche_input" placeholder="Entrez votre recherche"/>
                        <input type="submit" id="recherche_btn" value="Rechercher"/>
                    </div>
                </form>


                <?php include(__DIR__ . "./chat.html"); ?>


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
            console.log(displayed);
        }
    </script>

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
            console.log(displayed);
        }
    </script>

    <script src="./static/script/chat.js"></script>
    <script src="./static/script/acceuil.js"></script>

</body>
</html>