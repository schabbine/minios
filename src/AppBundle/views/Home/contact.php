<?php include __DIR__ . '/../top.php'; ?>

<form class="form-horizontal" action="<?php echo $path('verifMail') ?>" method="POST">
    <div class="form-group">
    <label for="nom" class="col-sm-2 control-label">Nom</label>
    <div class="col-sm-10">
      <input type="nom" class="form-control" name="nom"  placeholder="Nom">
    </div>
  </div>
    <div class="form-group">
    <label for="prenom" class="col-sm-2 control-label">Prenom</label>
    <div class="col-sm-10">
      <input type="prenom" class="form-control" name="prenom" placeholder="Prenom">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="message" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <input type="message" class="form-control" name="message" placeholder="description de la demande">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default"  >Envoyer</button>
    </div>
  </div>
</form>



<?php include __DIR__ . '/../bottom.php'; ?>