<div class="container">
<form method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Date achat :  </label>
      <input type="date" class="form-control" id="inputEmail4" name="date_achat" value = "<?php echo $data['date_achat']?>" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Garde :  </label>
      <input type="text" class="form-control" id="inputEmail4" name="garde_jusqua" value = "<?php echo $data['garde_jusqua']?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Notes :  </label>
      <input type="text" class="form-control" id="inputEmail4" name="notes" value = "<?php echo $data['notes']?>" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Prix :  </label>
      <input type="text" class="form-control" id="inputEmail4" name="prix" value = "<?php echo $data['prix']?>" >
    </div>
     <div class="form-group col-md-6">
      <label for="inputEmail4">Quantite :  </label>
      <input type="text" class="form-control" id="inputEmail4" name="quantite" value = "<?php echo $data['quantite']?>">
    </div>
     <div class="form-group col-md-6">
      <label for="inputEmail4">millesime :  </label>
      <input type="text" class="form-control" id="inputEmail4" name="millesime" value = "<?php echo $data['millesime']?>" >
    </div>
    <input type="submit"  class="btn-success" value="Enregistrer">
    <input type="hidden" name="id" value="<?php echo $data["id"]?>">
    <input type="hidden" name="requete" value="sauvegarder">
</form>
</div>