<?php
ob_start();

$title = 'Commentaire-' . $comment->id;
?>
<h2 class="text-center">Modifier le commentaire Numéro
    <?= $comment->id; ?>
</h2>

<div class="container mt-5">
    <div class="row">
        <form action="index.php?action=updated&amp;comment_id=<?= $comment->id ?>" method="POST"
            class="col-md-8 offset-md-2">
            <p class="form-group">
                <label for="author" class="control-label">Auteur</label>
                <input type="text" name="author" id="author" value="<?= $comment->author; ?>" class="form-control">
            </p>
            <p class="form-group">
                <label for="message" class="control-label">Message</label>
                <textarea name="message" id="message" cols="30" rows="10" class="form-control">
                    <?= nl2br($comment->comment); ?>
                </textarea>
            </p>
            <button class="btn btn-info btn-block">Editer</button>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once "template.php";