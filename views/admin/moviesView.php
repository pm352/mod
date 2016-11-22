<h2>Gestion du film</h2>
<form action="" method="post">
	<fieldset>
	<legend>Ajout d'un film</legend>
		<label>Titre du film: </label><br/>
		<input type="text" name="titre" id="titre" />
		<br/>
		<label>Description: </label><br/>
		<textarea name="description" id="description" rows="10" cols="50"></textarea>
		<br/>
		<label>Image </label><br/>
		<input type="file" name="file" id="file">
		<br/>
		<label>Catégorie: </label><br/>
		<select name="">
			<option value="0">Choississez</option>
			<option></option>
		</select>
		<br/>
		<label>Acteurs: </label><br/>
		<select name="">
			<option value="0">Choississez</option>
			<option></option>
		</select>
		<br/>
		<label>Support: </label><br/>
		<select name="typ_id">
			<option value="0">Choississez</option>
			<option></option>
		</select>
		<br/>
		<label>Sortie: </label><br/>
		<input type="date" name="sortie" id="sortie">
		<br/>
		<input type="submit" value="Valider">
	</fieldset>
</form>