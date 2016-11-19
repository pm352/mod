<hr>
<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
		<div class="jumbotron">
			<h1>Projet MOD</h1>
			<p>La page d’accueil présente brièvement le concept et affiche en premier lieu un grand et gros champ de recherche parmi les films. Une liste non exhaustive de catégories est affichée. Le nombre de films de chaque catégorie (affichée sur l’accueil) est mis entre parenthèses à droite du nom de la catégorie. Les derniers films ajoutés seront aussi affichés avec leur affiche et leur nom.
			</p>
		</div>
	</div> 
	<div class="col-xs-2"></div>
</div>

<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Search for...">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Go!</button>
			</span>
		</div><!-- /input-group -->
	</div>
	<div class="col-xs-2"></div>
</div>
<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
		<ul class="list-inline">
		<?php foreach ($catResult as $catName) : ?>
			<li><a href="#"><?= $catName['cat_name']; ?></a></li>
		<?php endforeach; ?>
		</ul>
	</div> 
	<div class="col-xs-2"></div>
</div>
<div class="row">
	<!--affichage des posts limité à 4-->
	<?php foreach ($moviesData as $moviePost) : ?>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 thumb">
		<a class="thumbnail" href="movie.php?id=<?= $moviePost['mov_id']; ?>"><img class="img-responsive" src="<?= $moviePost['mov_poster']; ?>" alt=""></a>
		<h3><a href="movie.php?id=<?= $moviePost['mov_id']; ?>"><?= $moviePost['mov_title']; ?></a></h3>
	</div>
	<?php endforeach; ?>
</div>