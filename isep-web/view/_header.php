<div id="header_profil">
                    <a href="./profil">
                        <img src="<?php echo $_SESSION['profil_pic']; ?>" alt="Profil">
                    </a>
                    <div id="nom_btn">
                        <span id="nom_prenom">
                        <?php echo $_SESSION['nom']. ", " . $_SESSION['prenom'] . "      ▼" ?>
                        </span>
                        <div id="deco_pop_down">
                            <?php if ($_SESSION['role'] == 2) {
                                ?>
                                <a href="./admin">Admin</a>
                                <hr/>
                            <?php
                            }
                            ?>
                                <a href="./profil">Mon Profil</a>
                                <hr/>
                                <a href="./deconnexion">Deconnexion</a>
                        </div>
                    </div>

</div>