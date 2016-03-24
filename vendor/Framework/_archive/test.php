<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
<head>
    <title>Loc At Me</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body id="content">
<div id="enTete">
    <header class="frameHeader">
        <h1>LOC AT ME!</h1>
        <p class="slogan">Vous souhaitez louer une salle: </p>
    </header>
</div>
<div id="conteneur">
    <div id="connexion">
        <form action="" method="post">
            <fieldset>
                <legend>Connexion</legend>
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo"/><br/>
                <label for="mdp">Mot de passe</label>
                <input type="text" name="mdp"/><br/>
            </fieldset>
            <input type="submit" name="connexion">
            <fieldset>
                <legend>Pas encore Membre</legend>
                <a href="?page=inscription">Inscrivez-vous?</a>
            </fieldset>
        </form>
    </div>
</div>
<div id="foot">
    <footer></footer>
</div>

</body>
</html>