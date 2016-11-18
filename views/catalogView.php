<div class="form-group">
	<label for="choix">Choix page</label>

	<select id="choix" class="form-control">
		<option></option>
	</select>

	<label for="tri">Tri par date</label>
	<select id="tri" class="form-control">
		<option>Ascendant</option>
		<option>Déscendant</option>
	</select>
</div>

<hr />

<table>
	<tr>
		<td><img src="<?= $mvliste[0]['mov_poster'] ?>"></td>
		<td><?= $mvliste[0]['mov_id']?></td>
		<td><?= $mvliste[0]['mov_title'] ?><br /><?= $mvliste[0]['mov_synopsis']?></td>
		
		<td><button type="button" class="btn btn-default">Détails</button></td>
		<td><button type="button" class="btn btn-default">Modifier</button></td>
	</tr>
</table>
