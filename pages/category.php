<?php

use App\App;
use App\Table\Article;
use App\Table\Category;


$category = Category::find($_GET['id']);
if ($category === false) {
    App::notFound();
}
$articles = Article::lastByCategory($_GET['id']);
$categories = Category::all();
?>

<div class="row">
    <div class="col-sm-8">
        <ul>
            <?php foreach ($articles as $item) :?>
                <h2>
                    <a href="<?= $item->url; ?>"><?= $item->titre; ?></a>
                </h2>
                <?= $item->extrait; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-sm-4">
        <?php foreach ($categories as $item) :?>
            <h2>
                <a href="<?= $item->url; ?>"><?= $item->titre; ?></a>
            </h2>
        <?php endforeach; ?>
    </div>
</div>