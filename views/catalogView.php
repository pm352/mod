        
     <div class="container">   
        <div class="form-group">
            <form name="page_tri" id="page_tri" action="" method="post">
                <label for="choix">Choix page</label>

                <select id="choix" class="form-control">
                    <?php for ($i = 1; $i <= $resultat; $i++) : ?>
                        <option><?= $i ?></option>
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
                <?= showCatalog() ?>
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