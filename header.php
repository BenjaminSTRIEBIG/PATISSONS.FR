            <header>
                <div class="wrapper">
                    <nav>
                        <ul>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                            <li><a href="index.php">Accueil</a></li>
                            <li><a href="index.php?do=proposer">Proposer</a></li>
                            <li><a href="./"><img id="imgMenu" height="146" src="Images/logoMenu.png"></a></li>
                            <li><a href="index.php?do=deguster">Déguster</a></li>
                            <li><a href="index.php?do=recettes">Recettes</a></li>
                           
                            <?php
                                if(isset($_SESSION['login']))
                                {
                            ?>
                                    <a href="index.php?do=deconnection">Se déconnecter</a>
                            <?php
                                }
                                else
                                {
                            ?>
                                    <a href="index.php?do=connexionInscription">Se connecter</a>
                            <?php
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
            </header>
    
