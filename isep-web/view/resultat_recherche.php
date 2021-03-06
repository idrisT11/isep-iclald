<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./static/style/resultat_recherche.css">
    <link rel="stylesheet" href="./static/fonts/font.css">
    <link rel="stylesheet" href="./static/fonts/chat.css">

    <title>Acceuil</title>
</head>
<body>
    <div id="window">
        <nav>
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
                    <h1>Résultat de la recherche</h1> 
                    <p><?=$datum?></p> 
                </div>

                <?php include(__DIR__ . '/_header.php'); ?>
            </div>

            <section id="content">
                <div id="content_header">
                    <h1 id="title_content">
                        Voici les résultats pour la recherche : <?php echo $_GET['recherche_input']?> 
                    </h1>

                    <a href="./" id="configure_link">
                        Retour ➽
                    </a>
                </div>

                <div id="search_list">
                    <?php
                        foreach ($users as $user) {
                    ?>
                        <div class="search_result">
                            <div class="pic_ctn">
                                <img src="<?= get_profil_pic($user['TOKEN_USER'])?>" alt="">
                            </div>
                            <hr/>   

                            <div class="main_part">
                                <h1>
                                    <?= html_entity_decode($user['NOM'] . ' ' . $user['PRENOM']) ?>
                                </h1>

                                <div >
                                    <div class="result_body">
                                        <div>
                                            <p>Email : <em><?= html_entity_decode($user['EMAIL']) ?></em></p>
                                            <p>Genre : <em><?= html_entity_decode($user['GENRE']) ?></em></p>
                                        </div>

                                        <div>
                                            <p>Salle : <em><?= html_entity_decode($user['SALLE']) ?></em></p>
                                            <p>Dernière connexion : <em><?= html_entity_decode($user['DERNIER_ACCES']) ?></em></p>
                                        </div>
                                    </div>


                                    <div class="result_footer">                                    
                                        <a class="details_button" href="./profil?token_user=<?= $user['TOKEN_USER']?>">
                                            Détails
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    
                        }
                    ?>
                </div>


                <?php include(__DIR__ . "/chat.html"); ?>


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



    <script src="./static/script/chat.js"></script>
    <script src="./static/script/acceuil.js"></script>

</body>
</html>