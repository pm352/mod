<div class="formMovie" class="container">
	<img src="<?= $donnees[0]['mov_poster'] ?>"/>
	<p>Sortie en <?= substr($donnees[0]['mov_release_date'], - 10, 4) ?></p>
	<p>Support : <?= $donnees[0]['typ_name'] ?></p>
	<h2><?= $donnees[0]['mov_title'] ?></h2>
	<p><?=$donnees[0]['cat_name'] ?></p>
	<p><?=$donnees[0]['mov_description'] ?></p>
	<p><?=$donnees[0]['act_name'] ?></p>
	<p><?=$donnees[0]['mov_file'] ?></p>
</div>