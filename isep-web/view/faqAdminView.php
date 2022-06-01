<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../static/style/faqAdmin.css">
    <link rel="stylesheet" href="../static/fonts/font.css">

    <title>FAQ - Admin</title>
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
                      
            </div>
        </nav>

        <main>
            
            <div id="header">
                <div id="header_title">
                    <h1>Gestion de la foir aux questions</h1> 
                    <p><?=$datum?></p> 
                </div>

                <?php include(__DIR__ . '/_header_admin.php'); ?>
            </div>

            <section id="content">
                <div id="content_header">
                    <h1 id="title_content">
                        Gérer ici la foir aux questions
                    </h1>

                    <a href="./faq?action=add" id="configure_link">
                        Ajouter une question ➽
                    </a>
                </div>


                <div id="search_list">
                    <?php
                        foreach ($questions as $question) {
                    ?>
                        <div class="search_result">  
                            <div class="main_part">
                                <h1>
                                    <?= html_entity_decode($question['TITRE']) ?>
                                </h1>

                                <div >
                                    <div class="result_body">
                                        <?= html_entity_decode($question['CONTENU']) ?>
                                    </div>


                                    <div class="result_footer">       
                                        <a class="delete_button" href="./faq?action=delete&question_id=<?= $question['ID']?>">
                                            Supprimer
                                        </a>                             
                                        <a class="details_button" href="./faq?action=update&question_id=<?= $question['ID']?>">
                                            Modifier
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    
                        }
                    ?>
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
            console.log(displayed);
        }
    </script>



    <script src="./static/script/chat.js"></script>
    <script src="./static/script/acceuil.js"></script>

</body>
</html>