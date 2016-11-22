
     <div class="container">   
        <div class="form-group">
            <form name="page_tri" id="page_tri" action="" method="post">
                
                <label for="choix">Choix page</label>
                <select id="choix_page" name="choix_page" class="form-control">
                    <?php for ($i = 1; $i <= $resultat; $i++) : ?>
                        <option value="<?= $i ?>"
	                        <?php if ($i === $page) : ?>
	                         selected="selected"><?= $i ?>
	                        <?php else : ?>
	                        ><?= $i ?>
	                     	<?php endif ?>
                        </option>
                    <?php endfor ?>
                </select>

                <label for="tri">Tri par date</label>
                <select id="tri" name="tri_date" class="form-control">
                    <option value="ASC" selected>Croissant</option>
                    <option value="DSC">Décroissant</option>
                </select>
            </form>
        </div>

        <hr />

        <div class="table-responsive">
            <table class="table-responsive">			
                <?php foreach ($dp_sqlShowCatalog as $key => $value) : ?>
                	<tr>
                		<td style="padding-left: 15px; padding-right: 15px; padding-bottom: 15px"><a href="movie.php?id=<?= $value['ID'] ?>"><img src="<?= $value['affiche'] ?>" alt='movie-poster' height='200px' width='200px'" /></a>
                		</td>
                		<td width="70%">#<?= $value['ID'] ?><a href="movie.php?id=<?= $value['ID'] ?>"> <?= $value['title'] ?></a><br /><?= $value['synopsis'] ?> [.....]
                		</td>
                		<td style="padding-left: 15px"><a href="movie.php?id=<?= $value['ID'] ?>"><input type="button" class="btn btn-primary" name="detail" value="Détails" /><br /><br /></a><a href="admin/movies.php?id=<?= $value['ID'] ?>"><input type="button" class="btn btn-primary" name="modifier" value="Modifier" /></a>
                		</td>
                	</tr>
            	<?php endforeach ?>


            </table>
        </div>

        <!-- Pagination -->
        <nav aria-label="pagination">
            <ul class="pager">
                <?php if ($page > 1) : ?>
                <li><a href="?page=<?= $page -1 ?>"><span aria-hidden="true">&larr;</span> Précédent</a></li>
                <?php endif ?>
                <li> Page <?= $page ?> de <?= $resultat ?> </li>
                <?php if ($page < $resultat) : ?>
                <li><a href="?page=<?= $page + 1 ?>">Suivant <span aria-hidden="true">&rarr;</span></a></li>
                <?php endif ?>
            </ul>
        </nav>
    </div>