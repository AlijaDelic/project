<?php
include "../helpers/ClassLoader.php";

class Comments
{
    private $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public static function save()
    {
        if (isset($_POST['submit']) && isset($_POST['content']) && sizeof($_POST) > 0 && isset($_GET['id']) && $_POST['content'] != "") {
            $comment = new Comments($_POST['content']);
            $user = User::getLoggedInUser();
            $id = $_GET['id'];
            $instance = ConnectDb::getInstance();
            $conn = $instance->getConnection();
            $sql = $conn->prepare("
                          INSERT INTO comments (user_id, content, recipe_id)
                          VALUES 
                          ('$user[3]','$comment->content', '$id')
                           ");
            $sql->execute();
        }
    }

    public static function getData($data,$query="")
    {
        $instance = ConnectDb::getInstance();
        $conn = $instance->getConnection();
        $sql = $conn->prepare("
                      SELECT $data FROM comments c
                      JOIN users u ON u.user_id = c.user_id $query
                        ");
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function delete()
    {
        if (isset($_GET['delete_id'])){
            $id = $_GET['delete_id'];
            $comment_user_id = self::getData("c.user_id", "WHERE c.comment_id = '$id'");
            $loged_in_user_id = User::getLoggedInUser();
            if ($comment_user_id[0]['user_id'] == $loged_in_user_id[3]){
                $instance = ConnectDb::getInstance();
                $conn = $instance->getConnection();
                $sql = $conn->prepare("
                      DELETE FROM comments WHERE comment_id =  '$id'
                        ");
                $sql ->execute();
            }
        }
        else {
            return;
        }
    }
}