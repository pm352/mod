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

<div class="row">
    <div class="col-md-2">
            <img class="img-responsive" src="<?= $mvliste[0]['mov_poster'] ?>" alt="">
    </div>
    <div class="col-md-8">
        <h3><?= '#' . $mvliste[0]['mov_id'] ?> <a href=""><?= $mvliste[0]['mov_title'] ?></a></h3>
        <p><?= $mvliste[0]['mov_synopsis'] ?></p>
    </div>
    <div class="col-md-2">
        <button class="btn btn-primary">Détails</button><br /><br />
        <button class="btn btn-primary">Modifier</button>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<?php
		 foreach ($mvliste as $key => $value) {
		 	//print_r($value);

		 	if ($value['mov_poster']) {
		 		foreach ($value as $test) {
		 			var_dump($test);
		 		}
		 	}
		 	//foreach ($value as $test) {
		 		
			//echo "<h3>" . $test . "</h3>";
		 	//}

			
			
		}  
		?>
		
	</div>

</div>
