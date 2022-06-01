<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="./static/fonts/font.css">
    <link rel="stylesheet" href="./static/style/forume.css" media="(min-width: 950px)">
    <link rel="stylesheet" href="./static/style/mobile/forume.css" media="(max-width: 950px)">
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
                    <h1>Forum</h1> 
                    <p><?=$datum?></p> 
                </div>

                <?php include(__DIR__ . '/_header.php'); ?>
            </div>

            <section id="content">
                <div id="content_header">
                    <h1 id="title_content">
                        Echanger sur le forum :
                    </h1>

                    <a href="./forum?new_topic" id="configure_link" style="font-weight: bold;">
                        Nouveau Topic
                    </a>

                </div>

                <div id="forum_screen">

                    <form id="recherche" action="./forum" method="GET">
                        <input type="text" name="filtrer" id="recherche_input" placeholder="Entrez votre recherche"/>
                        <input type="submit" id="recherche_btn" value="Rechercher"/>
                    </form>
                    
                    <div id="forum_posts">

                    <?php
                        foreach ($topics as $topic) {
                            $user_pic = get_profil_pic($topic['AUTHOR_TOKEN']);

                    ?>
                        <div class="post">
                            <div id="img_ctn_post">
                                <img src="<?php echo $user_pic; ?>" alt="pic">
                            </div>
                            <hr>
                            <div id="main_ctn_post">
                                <h1><?= $topic['TITRE'] ?></h1>
                                <p>
                                    <?= $topic['CONTENU'] ?>
                                </p>
                                <div class="footer_post">
                                <?php
                                    if ($_SESSION['role'] == 2) {
                                ?>
                                    <a class="delete_post" href="./forum?action=delete&post=<?= $topic['ID'] ?>">
                                        supprimer
                                    </a>
                                <?php
                                    }
                                ?>

                                    <a class="respond_post" href="./forum/post/<?= $topic['ID'] ?>">
                                        Répondre 
                                        <!--<img src="./static/image/R.png" alt="l">-->
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>


                    </div>
                </div>


            </section>


            <div id="faq">
                <img src="./static/image/baguette.svg" width="50px" height="50px"> <br/><br/>
                Avez-vous vérifier si votre question ce trouve dans la FAQ ? 
                <br/>
                <br/>

                <a href="./faq"> Foire Aux Questions </a>
            </div>
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