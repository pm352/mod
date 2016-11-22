<h2>Gestion du film</h2>
<form enctype="multipart/form-data" action="" method="post">
		<label>Titre du film: </label><br/>
		<input type="text" name="titre" id="titre" value="<?=isset($movieTitre)? $movieTitre : ''; ?>"/>
		<br/>
		<label>Description: </label><br/>
		<textarea name="description" id="description" rows="10" cols="50"><?=isset($movieDescription)? $movieDescription : ''; ?></textarea>
		<br/>
		<label>Veuillez choisir votre image </label><br/>
		<input type="file" name="file" id="file">
		<br/>
		<label>Catégorie: </label><br/>
		<select name="catId">
			<option value="0">Choississez</option>
			<?php foreach($categorieListe as $key=>$value) :?>
			<option value="<?= $key ?>"><?= $value ?></option>
			<?php endforeach; ?>
		</select>
		<br/>
		<label>Acteurs: </label><br/>
		<select name="actId">
			<option value="0">Choississez</option>
			<?php foreach($actorListe as $key=>$value) :?>
			<option value="<?= $key ?>"><?= $value ?></option>
			<?php endforeach; ?>
		</select>
		<br/>
		<label>Support: </label><br/>
		<select name="typId">
			<option value="0">Choississez</option>
			<?php foreach($typStockageListe as $key=>$value) :?>
			<option value="<?= $key ?>"><?= $value ?></option>
			<?php endforeach; ?>
		</select>
		<br/>
		<label>Sortie: </label><br/>
		<input type="date" name="sortie" id="sortie" value="">
		<br/>
		<input type="submit" value="Valider">
</form>