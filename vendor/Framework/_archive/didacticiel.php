<?php include __DIR__ . '/../top.php'; ?>

<div class="container">
    <div class="col-md-12">
        <h2>Didacticiel</h2>

        <h3>Le but</h3>

        <p>
            Un intégrateur doit pouvoir ajouter des boucles, des conditions et des petites fonctions d'affichage en php
            dans le html.
        </p>

        <p>
            Afin d'aller plus loin dans cette démarche, nous allons voir l'étape qui est située juste avant l'affichage,
            c'est à dire
            <b>comment</b> ces variables sont envoyées à nos vues html.
        </p>

        <p>
            Et ainsi se familiariser avec un mini Framework sans pour autant connaître <b>l'object en php</b>.
        </p>

        <h3>Comment ça marche</h3>

        <h4>Les dossiers</h4>

        <table class="table table-bordered">
            <tr class="active">
                <th>Dossier</th>
                <th>Description</th>
            </tr>
            <tr>
                <td>
                    <b>app</b>
                </td>
                <td>les fichiers de configurations (BDD, routing des urls, ...)</td>
            </tr>
            <tr>
                <td>
                    <b>src</b>
                </td>
                <td>C'est ici que vous aller coder en php</td>
            </tr>
            <tr>
                <td>
                    <b>vendor</b>
                </td>
                <td>Ne pas coder ici, se sont les bibliothèques du Framework</td>
            </tr>
            <tr>
                <td>
                    <b>web</b>
                </td>
                <td>Votre dossier pour les fichiers public comme les images , les css, les js, ...</td>
            </tr>
        </table>

        <h3>WIKI du framework</h3>

        <h4>Informations générales</h4>

        <br>

        <p>
            <b>Regarder comment fonctionne ce lien:</b>
        </p>

        <a href="<?php echo $path('wiki'); ?>">>>>>>>>>>>>> WIKI <<<<<<<<<<<<<<</a>

        <br>Cette url a besoin  :
        <ul>
            <li>que l'url soit reconnue</li>
            <li>d'une classe php qui calculera les variables</li>
            <li>et d'une vue qui les affichera</li>
        </ul>

        <br>

        <p>
            <b>Regarder maintenant comment fonctionne les fichiers:</b>
        </p>

        <ul>
            <li> app/routes.php</li>
            <li> src/Controller/HomeController.php <i>dans l'action</i> wikiAction</li>
            <li> src/views/Home/wiki.php</li>
        </ul>

    </div>
</div>

<?php include __DIR__ . '/../bottom.php'; ?>
