<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contents/reset.css" />
        <link rel="stylesheet" href="Contents/style.css" />
        <title>Mon Site</title>
    </head>
    <header id="title">
        <h1>TITRE DU SITE</h1>
        <a id="headerMembers" href="<?= 'index.php?action=disconnection'?>">
        <p><input type="submit" value="Se déconnecter" /></p>
        </a>
    </header>
  <body>
    <div id="global">
        <div id="content">
          <?= $content ?>
        </div>
        <footer>
            
        </footer>
    </div>
  </body>
</html>