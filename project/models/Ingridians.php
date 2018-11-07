<?php
include "../helpers/ClassLoader.php";

class Ingridians
{
    private $name;

    public function _construct($name, $article_id)
    {
        $this->name = $name;
        $this->article_id = $article_id;
    }

    public static function get_data($data, $query = "")
    {
        $instance = ConnectDb::getInstance();
        $conn = $instance->getConnection();
        $sql = $conn->prepare(
            "SELECT $data FROM ingridians $query"
        );
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_COLUMN);
        return $result;
    }

    public static function save()
    {
        if (!isset($_POST['ingridian']) || sizeof($_POST['ingridian']) == 0 || $_POST['ingridian'] == 'Izaberite sastojak') {
            return false;
        } else {
            $arr = array();
            foreach ($_POST['ingridian'] as $ingridian) {
                array_push($arr, $ingridian['name']);
            }
            foreach ($arr as $ingridian) {
                $ingridians = Ingridians::get_data("name");
                $ingridans_name = trim($ingridian);
                if (in_array($ingridans_name, $ingridians) === false) {

                    $instance = ConnectDb::getInstance();
                    $conn = $instance->getConnection();
                    $sql = $conn->prepare(
                        "INSERT INTO ingridians (name)
                              VALUES ('$ingridans_name')"
                    );
                    $sql->execute();
                }
            }
            //ako ovde stavim return true nista mi ne ubaci
        }
    }
}