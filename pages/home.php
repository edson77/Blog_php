<?php
use App\Table\Article;
use App\Table\Category;

?>
<div class="row">
    <div class="col-sm-8">
        <ul>
            <?php foreach (Article::getAll() as $item) :?>
                <h2>
                    <a href="<?= $item->url; ?>"><?= $item->titre; ?></a>
                </h2>
                <?= $item->extrait; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-sm-4">
        <?php foreach (Category::all() as $item) :?>
            <h2>
                <a href="<?= $item->url; ?>"><?= $item->titre; ?></a>
            </h2>
        <?php endforeach; ?>
    </div>
</div>