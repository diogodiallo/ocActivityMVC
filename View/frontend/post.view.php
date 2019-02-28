<?php
ob_start();

$title = $post->title;
?>
<div class="container mt-5">
    <div class="row">
        <div class="card col">
            <div class="card-block">
                <div class="card-header">
                    <h3 class="card-title">
                        <?= $post->title; ?>
                        <em class="small"> posté le :
                            <?= date("d-m-Y à H:i", strtotime($post->created_at)); ?>
                        </em>
                    </h3>
                </div>
                <div class="card-body">
                    <?= nl2br(htmlentities($post->content)); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <hr>
    <p class="text-center"><a href="index.php?action=posts" class="btn btn-info">Revenir aux billets</a></p>
    <div class="row">
        <?php while ($comment = $comments->fetch()): ?>
        <div class="card col-md-8 offset-md-2 mb-4">
            <div class="card-header bg-success text-white">
                <h4 class="card-title">
                    <em class="small">
                        <strong>
                            <?= $comment->author; ?>
                        </strong>
                        le <time>
                            <?= $comment->date_comment_created; ?></time>
                        (<a href="index.php?action=updated&amp;comment_id=<?= $comment->id; ?>">modifier</a>)
                    </em>
                </h4>
            </div>
            <div class="card-body">
                <?= nl2br(htmlentities($comment->comment)); ?>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<hr>
<h2 class="text-center">Ajouter un commentaire</h2>

<div class="row">
    <form action="index.php?action=addComment&amp;id=<?= $post->id ?>" method="POST" class="col-md-8 offset-md-2">
        <p class="form-group">
            <label for="author" class="control-label">Auteur</label>
            <input type="text" name="author" id="author" class="form-control">
        </p>
        <p class="form-group">
            <label for="message" class="control-label">Message</label>
            <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
        </p>
        <button class="btn btn-info btn-block">Commenter</button>
    </form>
</div>
<?php
$content = ob_get_clean();
require_once "template.php";