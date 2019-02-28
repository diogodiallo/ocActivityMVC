<?php
ob_start();
$title = "Nos articles";
?>
<div class="container mt-5">
    <div class="row">
        <?php while ($post = $posts->fetch()): ?>
        <div class="card col">
            <div class="card-block">
                <div class="card-header">
                    <h3 class="card-title lead">
                        <a href="index.php?action=post&amp;id=<?= $post->id; ?>" class="">
                            <?= $post->title; ?>
                        </a>
                        <em class="small"> le :
                            <?= date("d-m-Y à H:i", strtotime($post->created_at)); ?> </em>
                    </h3>
                </div>
                <div class="card-body">
                    <?= nl2br($post->content); ?>
                </div>
                <div class="card-text text-center">
                    <a href="index.php?action=post&amp;id=<?= $post->id; ?>" class="btn btn-primary">
                        Ajouter un commentaire
                    </a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once "template.php";