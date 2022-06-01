<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../static/style/ticket.css">
    <link rel="stylesheet" href="../static/fonts/font.css">

    <title>Ticketing</title>
</head>
<body>
    <div id="window">
        <nav>
            <img src="../static/image/IM.png" width="50px" style="position: absolute">

            <div id="nav_ctn">

                <a href="../" class="nav_link">
                    <img src="../static/image/home.png" alt="home">
                </a>

                <a href="../dash" class="nav_link">
                    <img src="../static/image/graph.png" alt="dashboard">
                </a>

                <a href="../forum" class="nav_link">
                    <img src="../static/image/forum.png" alt="forum">
                </a>
                
                <a href="../map" class="nav_link">
                    <img src="../static/image/map.png" alt="map">
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
                    <h1>Ticketing</h1> 
                    <p><?=$datum?></p> 
                </div>

                <?php include(__DIR__ . '/_header_admin.php'); ?>
            </div>

            <section id="content">
                <div id="content_header">
                    <h1 id="title_content">
                        La liste des tickets emis par les techniciens :
                    </h1>

                    <a href="./ticket" id="configure_link" style="font-weight: bold;">
                        Tous les tickets
                    </a>
                    <a href="./ticket?open-only" id="configure_link" style="font-weight: bold;">
                        Ouverts Seulement
                    </a>

                </div>

                <div id="forum_screen">

                    
                    <div id="tickets">

                    <?php
                        if (!isset($tickets) || count($tickets) == 0) {
                    ?>
                        <div id="inactive">
                            <img src="../static/image/inactive.png" alt="inactive" width="230px">
                            <br>
                            <br>
                            Il n'y a aucun ticket pour le moment.

                        </div>
                    <?php
                        }
                        else 
                        foreach ($tickets as $ticket) {

                        switch ($ticket['ETAT']) {
                            case '0':
                                $sign = 'closed';
                                $sign_afficher = 'Fermé';
                                break;
                            case '1':
                                $sign = 'open';
                                $sign_afficher = 'Ouvert';
                                break;
                            case '2':
                                $sign = 'resolved';
                                $sign_afficher = 'Resolue';
                                break;
                            
                        }
                    ?>
                        <div class="search_result">
                            <div class="sign" id="sign-<?= $sign ?>">

                            </div>

                            <div class="main_part">
                                <h1>
                                    (<?= $sign_afficher ?>)
                                    <?= html_entity_decode($ticket['TITRE']) ?>
                                </h1>

                                <div >
                                    <div class="result_body">
                                        De : <em><?= get_name_from_id($db_connexion, $ticket['USER']) ?></em> <br><br>
                                        Contenu: <em><?= html_entity_decode($ticket['CONTENU']) ?></em><br>
                                        Emis le : <em><?= html_entity_decode($ticket['EMISSION']) ?></em>
                                    </div>

                                <?php
                                if ($ticket['ETAT'] != '0') {
                                ?>
                                    <div class="result_footer">   

                                        <?php
                                        if ($ticket['ETAT'] == '1') {
                                        ?>   
                                        <a class="delete_button" href="./ticket?action=mark&state=2&ticket_id=<?= $ticket['ID']?>">
                                            Marquer comme resolue ✅
                                        </a>    
                                        <?php } ?>
                                        <a class="suprime_button" href="../ticket?action=delete&ticket_id=<?= $ticket['ID']?>">
                                            Supprimer 
                                        </a>                          
                                        <a class="details_button" href="../ticket?ticket_id=<?= $ticket['ID']?>">
                                            Répondre 
                                        </a>
                                    </div>
                                <?php
                                }
                                else{
                                ?>
                                    <div class="result_footer"> 
                                        <a class="suprime_button" href="../ticket?action=delete&ticket_id=<?= $ticket['ID']?>">
                                            Supprimer 
                                        </a>                              
                                        <a class="details_button" href="../ticket?ticket_id=<?= $ticket['ID']?>">
                                            Voir les réponses
                                        </a>
                                    </div>   
                                <?php 
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>


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