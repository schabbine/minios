<?php include __DIR__ . '/../top.php'; ?>


<form class="form-horizontal">
    <div class="form-group">
    <label for="inputNom3" class="col-sm-2 control-label">Nom</label>
    <div class="col-sm-10">
      <input type="nom" class="form-control" id="inputNom3" placeholder="Nom">
    </div>
  </div>
    <div class="form-group">
    <label for="inputPrenom3" class="col-sm-2 control-label">Prenom</label>
    <div class="col-sm-10">
      <input type="prenom" class="form-control" id="inputEmail3" placeholder="Prenom">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputText3" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputText3" placeholder="description de la demande">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Envoyer</button>
    </div>
  </div>
</form>


<?php include __DIR__ . '/../bottom.php'; ?>