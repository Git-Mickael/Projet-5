<h1>Idenfiez vous</h1>
<form method="post" action="index.php?action=homePage">
        <input id="name" name="name" type="text" placeholder="PSeudo ou Email" required /><br/>
        <input id="Password" name="password" type="text" placeholder="Mot de passe" required /><br/>
        <input type="submit" value="Valider" />
</form>
<p>Pas de compte? par ici l'inscription!<a href="<?= 'index.php?action=create' ?>">
    Cr�er un compte
</a></p>
