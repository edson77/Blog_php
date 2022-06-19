<?php
$data = $db->query("SELECT * FROM articles",'App\Table\Article');
?>
<ul>
    <?php foreach ($data as $item) {?>
        <h2>
            <a href="<?= $item->url; ?>"><?= $item->titre; ?></a>
        </h2>
        <?= $item->extrait; ?>
    <?php } ?>
</ul>