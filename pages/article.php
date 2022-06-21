<?php

use App\App;
use App\Table\Article;

//pour eviter les attaques par injection SQL, le prepare statement est plus securiser
$post = Article::find($_GET['id']);
?>
<h1><?=$post->titre; ?></h1>
<p><?=$post->contenu; ?></p>
