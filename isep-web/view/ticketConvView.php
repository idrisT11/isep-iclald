<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./static/style/forume_conversation.css">
    <link rel="stylesheet" href="./static/fonts/font.css">

    <title>Ticket</title>
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
                    <h1>Ticket emis par <?= $username ?></h1> 
                    <p><?=$datum?></p> 
                </div>

                <?php include(__DIR__ . '/_header.php'); ?>
            </div>

            <section id="content">
                <div id="content_header">
                    <h1 id="title_content">
                    Ticket #<?= $ticket['ID'] ?>: <em><?= $ticket['TITRE'] ?></em>
                    </h1>

                    <?php if ($_SESSION['role'] == '2') {
                    ?>
                    <a href="<?=$origin?>admin/ticket" id="configure_link" style="font-weight: bold;">
                        Retour
                    </a>       
                    <?php } else { ?>
                    <a href="<?=$origin?>ticket" id="configure_link" style="font-weight: bold;">
                        Retour
                    </a>
                    <?php } ?>

                </div>

                <div id="content_header">
                    <?php
                    if ($ticket['ETAT'] == '1') {
                    ?>   
                        <a class="delete_button" href="<?=$origin?>ticket?action=mark&state=2&ticket_id=<?= $ticket['ID']?>">
                            Marquer comme resolue ✅
                        </a>    
                    <?php } ?>

                    <?php
                    if ($ticket['ETAT'] == '1') {
                    ?>   
                        <a class="delete_button" href="<?=$origin?>ticket?action=mark&state=0&ticket_id=<?= $ticket['ID']?>">
                            Fermer le ticket ❌
                        </a>    
                    <?php } ?>

                
                    <?php
                    if ($_SESSION['role'] == '2') {
                    ?>  
                    <a class="suprime_button" href="<?=$origin?>ticket?action=delete&ticket_id=<?= $ticket['ID']?>">
                        Supprimer 
                    </a>  
                    <?php } ?>


                </div>

                <div id="forum_screen">

                    <div id="forum_posts">
                        <div id="main_post_<?= $sign ?>">
                            <div id="img_ctn_post">
                                <img src="<?= get_profil_pic($db_connexion, $email) ?>" alt="pic">
                            </div>
                            <hr>
                            <div id="main_ctn_post">
                                <h1> (<?= $sign_afficher ?> ) <?= $ticket['TITRE'] ?></h1>
                                <p>
                                    <?= $ticket['CONTENU'] ?>
                                </p>
                                <div class="footer_post">
                                    <?= $ticket['EMISSION'] ?>
                                </div>
                            </div>
                            <hr>
                            <div class="sign" id="sign-<?= $sign ?>">

                            </div>
                        </div>

                        <?php 
                        if ($sign == 'open') {
                        ?>                        
                        <form action="<?=$origin?>ticket?action=respond&ticket_id=<?=$ticket['ID']?>" id="response" method="GET">
                            <h2>Ecrire votre réponse ici :</h2>
                            <textarea name="reponse" id="reponse"></textarea>
                            <input type="hidden" name="action" value="respond">
                            <input type="hidden" name="ticket_id" value="<?=$ticket['ID']?>">
                            <input type="submit" value="Envoyer" id="submit">
                            
                        </form>
                        <?php
                        }
                        ?>

                        <h1>Réponses du Ticket :</h1>


                    <?php
                        $conversation_array = json_decode($ticket['CONVERSATION']);
                        foreach ($conversation_array as $rep) {
                           
                            $pic = get_profil_pic_from_token($rep->token_user);

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