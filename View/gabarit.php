<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contents/reset.css" />
        <link rel="stylesheet" href="Contents/style.css" />
        <title>Mon Site</title>
    </head>
    <div id="global">
        <div id="nav">
            <header id="header">
            </header>
            <nav id="title">
                <h1>TITRE DU SITE</h1>
                <?php 
                if (isset($_SESSION['email']) AND isset($_SESSION['password'])){?>
                    <a id="headerMembers" href="<?= 'index.php?action=disconnection'?>">
                        <p><input type="submit" value="Se déconnecter" /></p>
                    </a>
                    <ul>
                        <li>Accueil</li>
                        <li>Prestations</li>
                        <li>Tarifs</li>
                        <li>Reservation</li>
                    </ul>
                <?php
                }
                else if (isset($_SESSION['name']) AND isset($_SESSION['adminPassword'])){?>
                    <a id="headerAdmin" href="<?= 'index.php?action=adminDisconnection'?>">
                        <p><input type="submit" value="Se déconnecter" /></p>
                    </a>
                    <ul>
                        <a href="<?= 'index.php?action=createPage' ?>"> <li>Ajouter un aticle</li></a>
                        <a href="<?= 'index.php?action=modifyPage' ?>"><li>Modifier un article</li></a>
                        <a href="<?= 'index.php?action=identifyImage' ?>"><li>Image</li></a>
                        <li>Consulter votre planning</li>
                    </ul>
                <?php
                }
                else {?>
                    <a id="noConnect" href="<?= 'index.php?action=connection'?>">
                        <p><input id="connectButton" type="submit" value="Se connecter" /></p>
                    </a>
                <?php
                }?>
                
            </nav>
        </div>
        <div id="content">
            <body>
                <div id="container">
                    <div id="contents">
                      <?= $content ?>
                    </div>
                    <footer>

                    </footer>
                </div>
                <script src="Contents/contents.js"></script>
            </body>
        </div>
    </div>
</html>