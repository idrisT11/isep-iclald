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
                    <p>Samedi 30 avril 2022</p> 
                </div>

                <?php include(__DIR__ . './_header.php'); ?>
            </div>

            <section id="content">
                <div id="content_header">
                    <h1 id="title_content">
                    TOPIC #2: <em>Pourquoi mon code ne fonctionne pas ?</em>
                    </h1>

                    <a href="./forum" id="configure_link" style="font-weight: bold;">
                        Retour
                    </a>

                </div>

                <div id="forum_screen">

                    
                    <div id="forum_posts">
                        <div id="main_post">
                            <div id="img_ctn_post">
                                <img src="<?php echo $_SESSION['profil_pic']; ?>" alt="pic">
                            </div>
                            <hr>
                            <div id="main_ctn_post">
                                <h1>  Pourquoi mon code ne fonctionne pas ?</h1>
                                <p>
                                    J'ai rencotrait un problème récement Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore vitae consequatur modi dicta quo in assumenda impedit delectus, magni placeat, dolorum necessitatibus ratione, laudantium soluta dolorem autem similique non vero.
                                </p>
                                <div class="footer_post">
                                    4 avril 2019, 14h32
                                </div>
                            </div>
                        </div>

                        <form id="response">
                            <h2>Ecrire votre réponse ici :</h2>
                            <textarea name="reponse" id="reponse">

                            </textarea>
                            <input type="submit" value="Envoyer" id="submit">
                            
                        </form>

                        <h1>Réponses du Topic :</h1>
                        <div class="post">
                            <div id="img_ctn_post">
                                <img src="./static/image/profil_pic/default.png" alt="pic">
                            </div>
                            <hr>
                            <div id="main_ctn_post">
                                <h1>TAHER Moh </h1>
                                <p>
                                    C'est logique Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore vitae consequatur modi dicta quo in assumenda impedit delectus, magni placeat, dolorum necessitatibus ratione, laudantium soluta dolorem autem similique non vero.
                                </p>
                                <div class="footer_post">
                                    10 avril 2019, 15h38
                                </div>
                            </div>

                        </div>

                        <div class="post">
                            <div id="img_ctn_post">
                                <img src="<?php echo $_SESSION['profil_pic']; ?>" alt="pic">
                            </div>
                            <hr>
                            <div id="main_ctn_post">
                                <h1>TATACHAK Idris </h1>
                                <p>
                                    Merci pou ta réponse ! Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore vitae consequatur modi dicta quo in assumenda impedit delectus, magni placeat, dolorum necessitatibus ratione, laudantium soluta dolorem autem similique non vero.
                                </p>
                                <div class="footer_post">
                                    10 avril 2019, 16h02
                                </div>
                            </div>

                        </div>
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