<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./static/style/forume_conversation.css">
    <link rel="stylesheet" href="./static/fonts/font.css">

    <title>Forum</title>
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
                    <h1>Forum</h1> 
                    <p>Vendredi 6 mai 2022</p> 
                </div>

                <?php include(__DIR__ . '/_header.php'); ?>
            </div>

            <section id="content">
                <div id="content_header">
                    <h1 id="title_content">
                    TOPIC #<?= $topic['ID'] ?>: <em><?= $topic['TITRE'] ?></em>
                    </h1>

                    <a href="./forum" id="configure_link" style="font-weight: bold;">
                        Retour
                    </a>

                </div>

                <div id="forum_screen">

                    
                    <div id="forum_posts">
                        <div id="main_post">
                            <div id="img_ctn_post">
                                <img src="<?= get_profil_pic($topic['AUTHOR_TOKEN']) ?>" alt="pic">
                            </div>
                            <hr>
                            <div id="main_ctn_post">
                                <h1><?= $topic['TITRE'] ?></h1>
                                <p>
                                    <?= $topic['CONTENU'] ?>
                                </p>
                                <div class="footer_post">
                                    <?= $topic['DATE'] ?>
                                </div>
                            </div>
                        </div>

                        <form action="./forum?action=respond&post=<?=$topic['ID']?>" id="response" method="POST">
                            <h2>Ecrire votre réponse ici :</h2>
                            <textarea name="reponse" id="reponse">

                            </textarea>
                            <input type="submit" value="Envoyer" id="submit">
                            
                        </form>



                        <h1>Réponses du Topic :</h1>


                    <?php
                        $conversation_array = json_decode($topic['CONVERSATION']);
                        foreach ($conversation_array as $rep) {
                           
                            $pic = get_profil_pic($rep->token_user);

                    ?>


                        <div class="post">

                            <div id="img_ctn_post">
                                <img src="<?= $pic ?>" alt="pic">
                            </div>
                            <hr>
                            <div id="main_ctn_post">
                                <h1><?= $rep->nom. ' '. $rep->prenom ?></h1>
                                <p>
                                <?= $rep->content ?>
                                </p>
                                <div class="footer_post">
                                    <?= $rep->date ?>
                                </div>
                            </div>

                        </div>


                    <?php } ?>


                    </div>
                </div>


            </section>
        </main>
    </div>

    <script>
        //PopDown profil
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


</body>
</html>