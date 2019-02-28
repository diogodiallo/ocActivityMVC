<?php 
namespace App\Model;

use App\Model\Manager;

require_once 'Manager.php';

class PostManager extends Manager
{
    public function getPosts()
    {
        $db         = $this->dbConnect();
        $posts      = $db->query("SELECT id, title, content, created_at FROM posts");
        return $posts;
    }


    public function getPost($id)
    {
        $db     = $this->dbConnect();
        $req    = $db->prepare("SELECT id, title, content, created_at FROM posts WHERE id = :id");
        $req->execute(["id" => $id]);
        $post   = $req->fetch();
        $req->closeCursor();
        return $post;
    }
}