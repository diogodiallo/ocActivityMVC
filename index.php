<?php
use App\Model \{
    Post,
    Comment
};
use App\Controller\PostController;

require_once __DIR__ . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . "PostController.php";

try {
    $controller = new PostController();

    if (isset($_GET["action"])) {
        if ($_GET["action"] == "posts") {
            $controller->listPosts();
        } else if ($_GET["action"] == "post") {
            if (isset($_GET["id"]) && !empty($_GET["id"]) && (int)$_GET["id"] > 0) {
                $controller->post();
            }
        } else if ($_GET["action"] == "addComment") {
            if (isset($_GET["id"]) &&  !empty($_GET["id"]) && $_GET["id"] > 0) {

                $error = null;
                array_pop($_POST);
                extract($_POST);

                if (!empty($author) && !empty($message)) {
                    $controller->addComment($_GET["id"], $author, $message);
                } else {
                    $error = "Tous les champs doivent être renseignés.";
                }
            } else {
                $error = "Aucun identifiant trouvé pour cet article.";
            }
        } else if ($_GET["action"] == "updated") {

            if (isset($_GET["comment_id"]) &&  !empty($_GET["comment_id"]) && $_GET["comment_id"] > 0) {

                extract($_POST);

                if (!empty($author) && !empty($message)) {
                    $controller->updated($_GET["comment_id"], $author, $message);
                }
            }

            $comment = $controller->oneComment($_GET["comment_id"]);
        } else {
            $controller->listPosts();
        }
    }
} catch (Exception $e) {
    exit($e->getMessage() . " et code : " . $e->getCode() . '-' . $e->getLine() . '-' . $e->getFile());
}