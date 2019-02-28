<?php
namespace App\Controller;

use App\Model\PostManager;
use App\Model\CommentManager;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "PostManager.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "CommentManager.php";

class PostController
{


    public function listPosts()
    {
        $postManager = new PostManager();

        $posts = $postManager->getPosts();

        require dirname(__DIR__) . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . "frontend" . DIRECTORY_SEPARATOR . "posts.view.php";
    }

    public function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $id = (int)$_GET['id'];

        $post = $postManager->getPost($id);

        $comments = $commentManager->getComments($id);

        require dirname(__DIR__) . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . "frontend" . DIRECTORY_SEPARATOR . "post.view.php";
    }


    public function oneComment($commentId)
    {
        $commentManager = new CommentManager();

        $comment = $commentManager->getComment($commentId);

        require dirname(__DIR__) . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . "frontend" . DIRECTORY_SEPARATOR . "update.view.php";
    }

    public function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();

        $insertComment = $commentManager->insertComment($postId, $author, $comment);

        if ($insertComment === false) {
            throw new Exception("Une erreur est survenue lors de l'ajout de votre commentaire.");
        } else {
            header("Location:index.php?action=post&amp;id=" . $postId);
            exit();
        }
    }


    public function updated($id, $author, $comment)
    {
        $commentManager = new CommentManager();

        $update = $commentManager->updateComment($id, $author, $comment);

        if ($update !== false) {
            header("Location:index.php?action=posts");
            exit();
        } else {
            throw new Exception("Erreur lors de la modification du commentaire-" . $id);
        }
    }
}