<?php include __DIR__ . '/../top.php'; ?>

<div class="container">
    <div class="col-md-12">
        <h2>Gérer une Bdd avec Pdo de php</h2>

        <p class="bg-success">
            Ouvrez le fichier src/AppBundle/views/Home/bdd.php afin de regarder le code en même temps que les exemples
        </p>

        <h3>Articles</h3>

        <p>Tableau de la variable <b>$marques</b></p>

        <table class="table table-bordered">
            <tr>
                <th style="width: 60px">Clef</th>
                <th>Article - (<?php echo count($articles); ?>)</th>
                <th style="width: 170px">Actions</th>
            </tr>
            <?php foreach ($articles as $article): ?>
                <tr>
                    <td>
                        <?php echo $article['id']; ?>
                    </td>
                    <td>
                        <?php echo $article['nom']; ?>
                    <td>
                        <a href="#" class="btn btn-success btn-xs">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Voir
                        </a>
                        <a href="<?php echo $path('delete'); ?>?id=<?php echo $article['id']; ?>" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../bottom.php'; ?>
