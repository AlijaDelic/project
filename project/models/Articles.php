<?php
include "../helpers/ClassLoader.php";

class Articles
{
    private $recipe_id;
    private $ingridian_id;
    private $amount;

    public function __construct($recipe_id, $ingridian_id, $amount)
    {
        $this->recipe_id = $recipe_id;
        $this->ingridian_id = $ingridian_id;
        $this->amount = $amount;
    }

    public static function validate()
    {
        $errors = array();
        if (!isset($_POST) || !isset($_POST['submit']) || !isset($_POST['title']) || $_POST['subtitle'] == "" || $_POST['content'] == "" || $_POST['category'] == "" || $_FILES['image'] == "" || $_POST['ingridian'] == "") {
            $error = "Popunite sva polja";
            array_push($errors, $error);
            return $errors;
        } else {
            $recepies = Recipes::save();
            $ingridans = Ingridians::save();
            if ($recepies !== true) {
                foreach ($recepies as $recepy) {
                    array_push($errors, $recepy);
                    return $errors;
                }
            }
            if ($ingridans === false) {
                $error = "Popunite sva polja";
                array_push($errors, $error);
                return $errors;
            }
        }

        return $errors;
    }

    public static function save()
    {
        $errors = self::validate();
        if (sizeof($errors) == 0) {
            $title = $_POST['title'];
            foreach ($_POST['ingridian'] as $ingridian) {
                $ingridian_name = trim($ingridian['name']);
                $ingridian_amount = trim($ingridian['amount']);
                $instance = ConnectDb::getInstance();
                $conn = $instance->getConnection();
                $sql = $conn->prepare("
                                 INSERT INTO articles (recipe_id, ingridian_id, amount)
                                 VALUES (
                                 (SELECT recipe_id FROM recipes WHERE title LIKE '$title' ORDER BY recipe_id DESC LIMIT 1),
                                 (SELECT ingridian_id FROM ingridians WHERE name LIKE '$ingridian_name' ),
                                 '$ingridian_amount'
                                 )
                                ");
                $sql->execute();
            }
            return true;
        } else {
            return $errors;
        }
    }

    public static function getData($data, $condition = "")
    {
        $instance = ConnectDb::getInstance();
        $conn = $instance->getConnection();
        $sql = $conn->prepare("SELECT $data
                                        FROM articles
                                        JOIN recipes ON articles.recipe_id = recipes.recipe_id
                                        JOIN categories ON recipes.category_id = categories.category_id
                                        JOIN ingridians ON articles.ingridian_id = ingridians.ingridian_id
                                        JOIN users ON recipes.user_id = users.user_id
                                        $condition
                                        ");
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function deleteData()
    {
        if (isset($_GET['id'])) {
            $recipe_id = $_GET['id'];
            $image = self::getData("recipes.image", "WHERE recipe.id = '$recipe_id'");
            if (count($image)) {
                $img = "../views/images/" . $image[0];
                @unlink($img);
            }
            $instance = ConnectDb::getInstance();
            $conn = $instance->getConnection();
            $sql = $conn->prepare("
                                            DELETE a.* , b.*
                                            FROM articles a
											JOIN recipes b 
                                            on b.recipe_id = a.recipe_id
                                            WHERE a.recipe_id = '$recipe_id'
                                            ");
            $sql->execute();
            return true;
        }

    }
}