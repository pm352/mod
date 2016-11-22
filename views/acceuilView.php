<!-- Jumbotron -->
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="jumbotron">
				<h2>Projet MOD</h2>
				<p>Le projet MOD à été conçu et réalisé par la Team Master of desaster.<br>
				C'est une interface permettant de saisir et rechercher des copies légales de films.</p>
			</div>
		</div> 
	</div>
</div>
<!-- Barre de recherche -->
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<form class="navbar-form middle">
				<div class="input-group input-group-lg">
					<input type="text" name="s" value="<?= isset($search)? $search:'' ?>" class="form-control" placeholder="Search for...">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">Search</button>
					</span>
				</div>
			</form>
		</div>
	</div>
<!-- Liens de categories -->
	<div class="row catName">
		<div class="col-xs-12">
			<ul class="list-inline">
			<?php foreach ($catResultCount as $catNameCount) : ?>
				<li><a href="#"><?= $catNameCount['cat_name'].' ('. $catNameCount['nb_film'].')'; ?></a></li>
			<?php endforeach; ?>
			</ul>
		</div> 
	</div>
</div>
<!-- Les 4 Affiches de film les plus récement ajoutées -->
<div class="container">
	<div class="row">
		<!--affichage des posts limité à 4-->
		<?php foreach ($moviesData as $moviePost) : ?>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 thumb">
			<a class="thumbnail" href="movie.php?id=<?= $moviePost['mov_id']; ?>"><img class="img-responsive" src="<?= $moviePost['mov_poster']; ?>" alt=""></a>
			<h4><a href="movie.php?id=<?= $moviePost['mov_id']; ?>"><?= $moviePost['mov_title']; ?></a></h4>
		</div>
		<?php endforeach; ?>
	</div>
</div>