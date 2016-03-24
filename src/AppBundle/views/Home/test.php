<?php include __DIR__ . '/../top.php'; ?>

<div class="container">
    <div class="col-md-12">
        <h2>Test du framework</h2>

        <p class="bg-success">
            Ouvrez le fichier src/AppBundle/views/Home/wiki.php afin de regarder le code en même temps que les exemples
        </p>

        <h3>Tableaux</h3>

        <p>Tableau de la variable <b>$marques</b></p>

        <table class="table table-bordered">
            <tr>
                <th>Clef</th>
                <th>Marque - (<?php echo count($marques); ?>)</th>
            </tr>
            <?php foreach ($marques as $key => $marque): ?>
                <tr>
                    <td>
                        <b><?php echo $key; ?></b>
                    </td>
                    <td>
                        <?php echo $marque; ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>

        <br>

        <h3>Les fonction custom</h3>

        <h4>La fonction custom $asset()</h4>

        <p>Cette fonction permet d'aller chercher directement dans le dossier <b>web</b> sans renseigné l'intégralité du
            chemin du dossier (pour des image par exemple)</p>

        <p style="background: #eeeeee;padding: 10px">
            <img src="<?php echo $asset('img/wi.jpg'); ?>" class="img-circle" style="height: 100px;">
            <img src="<?php echo $asset('img/mario.jpg'); ?>" class="img-circle" style="height: 100px;">
        </p>

        <br>

        <h4>La fonction custom $path()</h4>

        <p>Plus besoin d'écrire les url, cette fonction permet d'indiquer le nom de la route à la place. L'url sera auto
            générer</p>

        <a class="btn btn-info" href="<?php echo $path('index'); ?>">Aller sur la page d'accueil</a>
    </div>
</div>

<?php include __DIR__ . '/../bottom.php'; ?>
