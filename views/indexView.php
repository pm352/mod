<hr>
<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
		<div class="jumbotron">
			<h2>Projet MOD</h2>
			<p>Le projet MOD à été conçu et réalisé par la Team Master of desaster.</p>
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
		<?php foreach ($catResultCount as $catNameCount) : ?>
			<li><a href="#"><?= $catNameCount['cat_name'].' ('. $catNameCount['nb_film'].')'; ?></a></li>
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