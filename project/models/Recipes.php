<?php
require_once('../helpers/ClassLoader.php');

class Recipes
{
    private $title;
    private $subtitle;
    private $category;
    private $content;
    private $image;

    public function __construct($title, $subtitle, $category, $content, $image)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->category = $category;
        $this->content = $content;
        $this->image = $image;
    }

    public static function validation()
    {


        $errors = array();
        $uploadOk = 1;
        if (!isset($_POST['title']) || strlen($_POST['title']) <= 3) {
            $msg = "Naslov mora imati vise od 3 slova!";
            array_push($errors, $msg);
            $uploadOk = 0;
        }
        if (!isset($_POST['content']) || strlen($_POST['content']) < 4) {
            $msg = "Postupak mora imati vise od 4 znaka!";
            array_push($errors, $msg);
            $uploadOk = 0;

        }
        if (!isset($_POST['category']) || $_POST['category'] == 'Izaberite kategoriju') {
            $msg = "Odaberite kategoriju!";
            array_push($errors, $msg);
            $uploadOk = 0;
        }
        if (!isset($_POST['ingridian'])) {
            $msg = "Unesite sastojke";
            array_push($errors, $msg);
            $uploadOk == 0;
        }
        if (isset($_FILES['image']['name'])) {
            $target_dir = "../views/images/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (isset($_POST["submit"]) && isset($_FILES) && isset($_FILES['image'])) {
                if ($_FILES['image']['type'] == 'image/jpeg') {
                    $uploadOk = 1;
                } else {
                    $msg = "Fajl koji ste unijeli nije slika.";
                    array_push($errors, $msg);
                    $uploadOk = 0;
                }
            }
            if (file_exists($target_file)) {
                $msg = "Slika vec postoji.";
                array_push($errors, $msg);
                $uploadOk = 0;
            }

            if ($_FILES["image"]["size"] > 500000) {
                $msg = "Slika je prevelika.";
                array_push($errors, $msg);
                $uploadOk = 0;
            }
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                $msg = "Samo JPG, JPEG, PNG & GIF files su dozvoljeni formati za unos.";
                array_push($errors, $msg);
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                $msg = "Slika nije uploadovana.";
                array_push($errors, $msg);
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $msg = "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
                } else {
                    $msg = "Doslo je do pogreske prilikom unosa slike.";
                    array_push($errors, $msg);
                }
            }
        }
        return $errors;
    }

    public static function save()
    {

        $errors = self::validation();
        if (sizeof($errors) > 0) {
            return $errors;
        } else {
            $rec = new Recipes($_POST['title'], $_POST['subtitle'],
                $_POST['category'], $_POST['content'],
                $_FILES['image']['name']);
            $user = User::getLoggedInUser();
            $instance = ConnectDb::getInstance();
            $conn = $instance->getConnection();
            $sql = $conn->prepare("
                                    INSERT INTO recipes (title, subtitle, category_id, content, image, user_id, date) 

                                     VALUES 
                                      ('$rec->title',

                                     '$rec->subtitle',

                                     (SELECT categories.category_id FROM categories WHERE categories.category_name LIKE '$rec->category' LIMIT 1),

                                      '$rec->content',

                                      '$rec->image',
                                  
                                      (SELECT user_id FROM users WHERE username LIKE '$user[0]' limit 1),
                                      
                                      NOW()
                                      )");
            $sql->execute();
            return true;
        }
    }

    public static function getData($data, $query = "")
    {
        $instance = ConnectDb::getInstance();
        $conn = $instance->getConnection();
        $sql = $conn->prepare("SELECT $data FROM recipes 
                                        JOIN categories on categories.category_id = recipes.category_id
                                        $query
                                        ");
        $sql->execute();
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

}