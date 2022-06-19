<?php
//pour eviter les attaques par injection SQL, le prepare statement est plus securiser
$post = $db->prepare("SELECT * FROM articles WHERE id = :id",['id' => $_GET['id']],'App\Table\Article',true);
?>
<h1><?=$post->titre; ?></h1>
<p><?=$post->contenu; ?></p>
