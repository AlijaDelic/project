<?php
require_once('../helpers/ClassLoader.php');

class Categories
{
    private $category_name;

    public function __construct($category_name)
    {
        $this->category_name = $category_name;
    }

    public static function getData($data)
    {
        $instance = ConnectDb::getInstance();
        $conn = $instance->getConnection();
        $sql = $conn->prepare("
                    SELECT $data FROM categories");
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_COLUMN);
        return $result;
    }


    public static function save()
    {
        if (isset($_POST['submit']) && !empty($_POST['category_name'])) {
            $instance = ConnectDb::getInstance();
            $conn = $instance->getConnection();
            $check_if_exist = self::getData("category_name");
            if (!in_array($_POST['category_name'], $check_if_exist)) {
                $category = new Categories($_POST['category_name']);
                $sql = $conn->prepare("INSERT INTO categories (category_name) VALUES ('$category->category_name')");
                $sql->execute();
                return true;
            } else
                {
                return false;
                }
        }
    }

    public static function delete()
    {
        if (isset($_POST['delete']))
        {
            $instance = ConnectDb::getInstance();
            $conn = $instance->getConnection();
            $name = $_POST['delete_category'];
            $sql = $conn->prepare("
                            DELETE FROM categories WHERE category_name LIKE '$name' LIMIT 1
                            ");
            $sql->execute();
            if ($sql->execute() === false){
                return false;
            }else{
                return true;
            }
        }
    }

}