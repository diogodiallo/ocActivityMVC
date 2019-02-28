<?php
namespace App\Model;

use App\Model\Manager;

require_once 'Manager.php';

class CommentManager extends Manager
{
    /**
     * get all comments related to a post
     *
     * @param  int $postId
     *
     * @return $comments
     */
    public function getComments($postId)
    {
        $db     = $this->dbConnect();

        $comments    = $db->prepare("SELECT id, author, comment, DATE_FORMAT(created_at,'%d/%m/%Y à %H\h%i\mn%s\s') AS date_comment_created 
                                FROM comments 
                                WHERE post_id = :post_id 
                            ");

        $comments->execute(["post_id" => $postId]);

        return $comments;
    }


    /**
     * get a comment by id
     *
     * @param  int $commentId
     *
     * @return $comment
     */
    public function getComment($commentId)
    {
        $db = $this->dbConnect();

        $req = $db->prepare("SELECT id, author, comment, DATE_FORMAT(created_at,'%d/%m/%Y à %H\h%i\mn%s\s') AS date_comment_created 
                            FROM comments 
                            WHERE id = :id");

        $req->execute(["id" => $commentId]);
        $comment    = $req->fetch();

        $req->closeCursor();

        return $comment;
    }


    /**
     * insert a Comment in the comments table
     *
     * @param  int $id
     * @param  string $author
     * @param  string $comment
     *
     * @return void
     */
    public function insertComment($id, $author, $comment)
    {
        $db     = $this->dbConnect();

        $req    = $db->prepare("INSERT INTO comments(post_id, author, comment)  
                                VALUES(:post_id, :author, :comment)");

        $commentInserted = $req->execute([
            "post_id" => $id,
            "author"  => $author,
            "comment" => $comment
        ]);

        $req->closeCursor();
        return $commentInserted;
    }


    /**
     * update a Comment
     *
     * @param  int $id
     * @param  ?string $author
     * @param  ?string $message
     *
     * @return $update
     */
    public function updateComment($id, $author, $message)
    {
        $db     = $this->dbConnect();
        $req    = $db->prepare("UPDATE comments 
                                SET author = :author, comment = :comment 
                                WHERE id = :id
                            ");
        $update = $req->execute([
            "id"        => $id,
            "author"    => $author,
            "comment"  => $message
        ]);

        $req->closeCursor();
        return $update;
    }
}